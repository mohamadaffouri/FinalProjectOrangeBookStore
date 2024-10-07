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
        $inventoryItems = Inventory::all();

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
    public function showBooks()
{
    // Fetch all inventory items along with their related books
        $inventoryItems = Inventory::with('book')->get();

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

    return view('buyBook.bookDetails', compact('inventoryItem', 'averageRating', 'totalReviews', 'starRatings'));
}
}
