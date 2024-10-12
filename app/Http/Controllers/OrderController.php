<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Inventory;
use App\Models\Order;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    // This for Sell Orders in dashboard admin
    public function index(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Get the number of items per page, default to 10 if not set
        $itemsPerPage = $request->input('items_per_page', 10);

        // Query orders, optionally filtering by order ID or user name
        $orders = Order::query() ->where('type', 'sell');

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
    // this for orders buy in dashboard
    public function indexBuy(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Get the number of items per page, default to 10 if not set
        $itemsPerPage = $request->input('items_per_page', 10);

        // Query orders, optionally filtering by order ID or user name
        $orders = Order::query() ->where('type', 'buy');

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
            'status' => 'pending',
            'type' =>'sell'  // Default status is pending
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

    if ($validatedData['status'] === 'completed' && $order->type == 'sell') {
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
public function updateStatusBuyOrders(Request $request, $id)
{
    try {
        // Validate the request
        $validatedData = $request->validate([
            'status' => 'required|in:pending,shipped,completed,refunded,canceled',
        ]);

        // Find the order
        $order = Order::findOrFail($id);

        // Update the order status
        $order->status = $validatedData['status'];
        $order->save();

        // Return success response
        return response()->json(['success' => true, 'message' => 'Order status updated successfully.']);

    } catch (\Exception $e) {
        // Catch any exception and return a JSON error response
        return response()->json(['success' => false, 'message' => 'Error updating order status: ' . $e->getMessage()], 500);
    }
}



public function saveAddress(Request $request)
{
    // Validate that an address was selected
    $request->validate([
        'selected_address' => 'required|exists:addresses,id',
    ]);

    // Save the selected address ID to the session
    session()->put('selected_address', $request->input('selected_address'));

    // Redirect to the next step (e.g., payment page)
    return redirect()->back()->with('success', 'Address selected successfully.');

}
public function placeOrder(Request $request)
{
    // Retrieve cart and address info from session
    $cartItems = session()->get('buyCart', []);

    $totalPrice = session()->get('totalPrice', 0);
    $selectedAddressId = session()->get('selected_address');

    // Check if cart is not empty and address is selected
    if (empty($cartItems) || !$selectedAddressId) {
        return redirect()->back()->with('error', 'Please select an address and add items to your cart.');
    }

    // Retrieve the selected address from the database
    $address = Address::find($selectedAddressId);

    // Create a new order
    $order = Order::create([
        'user_id' => auth()->id(),
        'address_id' => $address->id,
        'total_price' => $totalPrice,
        'status' => 'pending',
        'type' =>'buy'// Set initial order status
    ]);

    // Loop through the cart items and save them in the order_items table
    foreach ($cartItems as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'book_id' => $item['book_id'],
            'quantity' => $item['quantity'],
            'condition' => $item['condition'],
            'price' => $item['price'],

        ]);

        // Find the inventory item and soft delete it
        $inventoryItem = Inventory::find($item['id']); // Assuming 'id' is the inventory ID in the cart
        if ($inventoryItem) {
            $inventoryItem->delete(); // This will soft delete the item
        }
    }

    // Clear the cart session
    session()->forget('buyCart');
    session()->forget('totalQuantity');
    session()->forget('totalPrice');
    session()->forget('selected_address');
    return redirect()->back()->with('success', 'Your order has been placed successfully.');

}
}
