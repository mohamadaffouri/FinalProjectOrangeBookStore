<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Inventory;


class InventoryController extends Controller
{

    public function index()
    {
        // Fetch all inventory items
        $inventoryItems = Inventory::all();;

        // Return a view to display the inventory
        return view('inventory.index', compact('inventoryItems'));
    }
    public function acceptBook($bookId)
    {
        $book = Book::findOrFail($bookId);

        return view('inventory.acceptBook', compact('book'));
    }

    public function addToInventory(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
            'condition' => 'required|string|in:new,used,damaged',
            'status' => 'required|string|in:available,sold,damaged',
        ]);

        Inventory::create([
            'book_id' => $request->input('book_id'),
            'quantity' => $request->input('quantity'),
            'condition' => $request->input('condition'),
            'status' => $request->input('status', 'available'),
        ]);

        return redirect()->route('inventory.index')->with('success', 'Book added to inventory successfully!');
    }
    public function showBooks(Request $request)
    {
        // Create a query to fetch inventory items with their related books
        $query = Inventory::with('book');

        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->where(function ($q) use ($request) {
                // Prioritize `discount_price` if available, otherwise use `price`
                $q->where(function ($query) use ($request) {
                    $query->whereNotNull('discount_price')
                          ->whereBetween('discount_price', [$request->input('min_price'), $request->input('max_price')]);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->whereNull('discount_price')
                          ->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
                });
            });
        }

        // Apply product status filter (sales, available, coming soon)
        if ($request->filled('status')) {
            $status = $request->input('status');

            if ($status === 'sales') {
                // If status is 'sales', filter books that have a discount price
                $query->whereNotNull('discount_price');
            } else {
                // Otherwise, filter based on the status as usual
                $query->where('status', $status);
            }
        }

        // Apply language filter
        if ($request->filled('language')) {
            if ($request->input('language') == 'other') {
                // Fetch books with languages other than English, German, or Swedish
                $query->whereHas('book', function ($q) {
                    $q->where(function ($q) {
                        $q->whereNotIn('languages', ['English', 'German', 'Swedish'])
                          ->orWhereNull('languages'); // Include where language is null
                    });
                });
            } else {
                // Fetch books with the selected language
                $query->whereHas('book', function ($q) use ($request) {
                    $q->where('languages', $request->input('language'));
                });
            }
        }

        // Paginate the results
        $inventoryItems = $query->paginate(9);

        return view('buyBook.allBook', compact('inventoryItems'));
    }

public function show($id)
{

    $inventoryItem = Inventory::with(['book.reviews' => function ($query) {
        $query->orderBy('created_at', 'desc')->take(2);
    }])->findOrFail($id);
    $averageRating = $inventoryItem->book->reviews->avg('rating');
    $totalReviews = $inventoryItem->book->reviews->count();
    $starRatings = [];
    for ($i = 5; $i >= 1; $i--) {
        $starRatings[$i] = [
            'count' => $inventoryItem->book->reviews->where('rating', $i)->count(),
            'percent' => ($totalReviews > 0) ? ($inventoryItem->book->reviews->where('rating', $i)->count() / $totalReviews) * 100 : 0
        ];
    }
    $relatedBooks = Inventory::where('book_id', $inventoryItem->book->id)
        ->where('id', '!=', $inventoryItem->id) // Exclude the current item
        ->take(4) // Limit to 4 related books
        ->get();


    return view('buyBook.bookDetails', compact('inventoryItem', 'averageRating', 'totalReviews', 'starRatings','relatedBooks'));
}






//---------admin dashboard to show books and change conditon if need---------------------------


public function adminManageBook (Request $request){
    // Get query parameters
    $statusFilter = $request->get('status', null);
    $search = $request->get('search', null);
    $itemsPerPage = $request->get('items_per_page', 10);
    $conditionMatch = $request->get('condition_match', null); // For sorting by condition matching

    // Start building the query
    $query = Inventory::with('book');

    // Apply search filter (search by book title or user name)
    if ($search) {
        $query->whereHas('book', function ($q) use ($search) {
            $q->where('title', 'like', "%$search%");
        });
    }

    // Apply status filter
    if ($statusFilter) {
        $query->where('status', $statusFilter);
    }

    // Apply condition match filter
    if ($conditionMatch === 'match') {
        // Filter where condition matches verified condition
        $query->whereColumn('condition', 'verified_condition');
    } elseif ($conditionMatch === 'mismatch') {
        // Filter where condition does not match verified condition
        $query->whereColumn('condition', '!=', 'verified_condition')
              ->update(['status' => 'coming soon']); // Set status to "coming soon" if condition doesn't match
    }

    // Paginate the results
    $inventoryItems = $query->paginate($itemsPerPage);

return view('adminDashboard.inventoryBooks', compact('inventoryItems'));

}

public function updateCondition(Request $request, $id)
{
    // Validate input
    $request->validate([
        'verified_condition' => 'required|string',
        'price' => 'required|numeric|min:0',
        'discount_price' => 'nullable|numeric|min:0',
    ]);


    $inventory = Inventory::findOrFail($id);
    $verifiedCondition = $request->input('verified_condition');


    $price = $request->input('price');
    $discount_price = $request->input('discount_price');

    // Compare user-provided condition and verified condition
    $status = $inventory->condition == $verifiedCondition ? 'available' : 'coming soon';

    // Update the condition and status
    $inventory->update([
        'verified_condition' => $verifiedCondition,
        'price' => $price,
        'discount_price' => $discount_price,
        'status' => $status,
    ]);

    return redirect()->back()->with('success', 'Condition verified and status updated.');
}

}
