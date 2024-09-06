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
}
