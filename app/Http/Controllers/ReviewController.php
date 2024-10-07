<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'msg' => 'required|string|max:500',
            'user_id' => 'required|exists:users,id',
        ]);
    
        Review::create([
            'rating' => $request->input('rating'),
            'review' => $request->input('msg'),
            'user_id' => $request->input('user_id'),
            'book_id' => $request->book_id, // Make sure book_id is passed to the form
        ]);
    
        return redirect()->back()->with('success', 'Thank you for your review!');
    }
    
    
}