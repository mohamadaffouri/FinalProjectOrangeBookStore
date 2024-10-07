<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    /**
     * Check if the book exists in the local database by its ISBN.
     * If not, try to fetch the book data from Google Books API.
     */
    public function checkIsbn(Request $request)
    {
        // Validate the input
        $request->validate([
            'isbn' => 'required|string',
        ]);

        // Retrieve the ISBN from the form input
        $isbn = $request->input('isbn');

        // Check if the book exists in the local database
        // $book = Book::where('isbn_10', $isbn)
        //             ->orWhere('isbn_13', $isbn)
        //             ->first();

        // // If the book exists, redirect to accept it into inventory
        // if ($book) {
        //     return redirect()->route('inventory.acceptBook', ['book' => $book->id]);
        // }

        // If the book does not exist, fetch data from Google Books API
        $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
            'q' => 'isbn:' . $isbn,
        ]);

        // Check if the API response is successful and contains book data
        if ($response->successful() && isset($response['items'][0])) {
            $bookData = $response['items'][0]['volumeInfo'];

            // Pass the fetched book data to the createFromApi view for user confirmation
            return view('books.createFromApi', [
                'isbn' => $isbn,
                'bookData' => $bookData
            ]);
        } else {
            // If no book data is found or the API fails, show an error
            return redirect()->back()->with('error', 'No book found with this ISBN.');
        }
    }

    /**
     * Display the form to create a new book manually.
     */
    public function create()
    {
        $isbn = session('isbn');
        return view('books.create', compact('isbn'));
    }

    /**
     * Store a new book in the database.
     */
    public function store(Request $request)
    {
        // Validate the book details
        $request->validate([
            'isbn_10' => 'required|string|size:10',
            'isbn_13' => 'nullable|string|size:13',
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'edition' => 'nullable|string|max:255',
            'image_url' => 'nullable|url'
        ]);

        // Check if the book already exists in the database
        $book = Book::where('isbn_10', $request->isbn_10)
                    ->orWhere('isbn_13', $request->isbn_13)
                    ->first();

        // If the book exists, update it; otherwise, create a new book
        if ($book) {
            // Update book details in the database
            $book->update([
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'edition' => $request->input('edition'),
                'isbn_13' => $request->input('isbn_13'),
                'image' => $request->input('image_url'), // Update ISBN-13 if changed
            ]);
        } else {
            // Create a new book entry
            Book::create([
                'isbn_10' => $request->input('isbn_10'),
                'isbn_13' => $request->input('isbn_13'),
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'edition' => $request->input('edition'),
                'image' => $request->input('image_url'),
            ]);
        }
// Save book details in the session (for cart or further use)
$cart = session()->get('cart', []); // Retrieve existing cart or empty array
$cart[$book->id] = [
    'id' => $book->id,
    'title' => $book->title,
    'author' => $book->author,
    'isbn_10' => $book->isbn_10,
    'isbn_13' => $book->isbn_13,
    'image' => $book->image,
    'quantity' => 1, // Default quantity for the cart
];
session()->put('cart', $cart);
        // Redirect to the inventory acceptance page
        return redirect()->route('inventory.acceptBook', ['book' => $book->id]);
    }
    public function remove(Request $request, $id)
    {
        // Get the current cart from the session
        $cart = session()->get('cart', []);

        // Check if the item exists in the cart
        if(isset($cart[$id])) {
            // Remove the item from the cart
            unset($cart[$id]);

            // Update the session with the modified cart
            session()->put('cart', $cart);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Item removed from cart successfully!');
    }
}

