<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Order;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Get the number of items per page, default to 10 if not set
        $itemsPerPage = $request->input('items_per_page', 10);

        // Query orders, optionally filtering by order ID or user name
        $orders = Order::query();

        if ($search) {
            $orders->where('id', 'LIKE', "%{$search}%") // Search by order ID
                   ->orWhereHas('user', function ($query) use ($search) {
                       $query->where('name', 'LIKE', "%{$search}%"); // Search by user name
                   });
        }
        $status = $request->input('status');
        if ($status) {
            $orders->where('status', $status); // Filter by status
        }

        // Paginate the orders
        $orders = $orders->paginate($itemsPerPage);




        return view('adminDashboard.sellOrders', compact('orders'));
    }
    public function show($id)
    {

        $order = Order::with(['orderItems.book', 'user'])->findOrFail($id);


        return view('adminDashboard.sellOrdersDetails', compact('order'));
    }



    public function proceedOrder(Request $request)
    {
        // Get the cart from the session
        $cart = session()->get('cart', []);

        if(empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate the total price of the cart items
        $totalPrice = 0;
        // foreach ($cart as $item) {
        //     $totalPrice += $item['price'] * $item['quantity'];
        // }

        // Create the order in the orders table
        $order = Order::create([
            'user_id' => auth()->id(),  // Assuming user is logged in
            'total_price' => $totalPrice,
            'shipping_cost' => 10.00,  // You can calculate or set this dynamically
            'status' => 'pending',     // Default status is pending
        ]);

        // Create the order items in the order_items table
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $item['id'],
                'quantity' => $item['quantity'],
                'condition' => $item['condition'], // Assuming all items are 'new', modify as necessary
                'price' => $totalPrice,
                'type' => 'sell'
            ]);
        }

        // Clear the cart from session
        session()->forget('cart');

        // Redirect to a confirmation page or order summary
        return redirect()->back()->with('success', 'Your order has been placed successfully.');

    }
    public function updateStatus(Request $request, $id)
{
    // Validate the request to ensure status is one of the allowed values
    $validatedData = $request->validate([
        'status' => 'required|in:pending,shipped,completed,refunded,canceled',
    ]);

    // Find the order
    $order = Order::findOrFail($id);

    // Update the order status
    $order->status = $validatedData['status'];
    $order->save();

    // If the status is 'completed', add all items to inventory
    if ($validatedData['status'] === 'completed') {
        foreach ($order->orderItems as $item) {
            // Add each order item to the inventory
            Inventory::create([
              'book_id' => $item->book_id,
                'quantity' => 1, // You can adjust this if needed
                'condition' => $item->condition, // Assuming 'condition' comes from the order item
                'status' => 'Coming Soon',
                'price'=> 0,  // New field
    'cost'=>0

            ]);
        }
    }

    return response()->json(['success' => true]);
}
}
