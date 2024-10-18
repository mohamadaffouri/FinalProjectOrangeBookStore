<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    $sortOrder = $request->input('sort', 'asc');
    $users = User::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%");
    }) ->orderBy('name', $sortOrder) // Sort the users by name
    ->get();
    return view('adminDashboard.manageUsers', compact('users', 'search'));
}
public function create()
{

    $roles = Role::all();
    return view('adminDashboard.createUser', compact('roles'));
}
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ];


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/users', 'public');
            $data['image'] = $imagePath;
        }

        User::create($data);
        return redirect()->route('manageUsers')->with('success', 'User created successfully!');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('adminDashboard.editUser', compact('user', 'roles'));
    }
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('mainPages.profile', compact('user', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role_id' => 'required|exists:roles,id',
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $user = User::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/users', 'public');
            $data['image'] = $imagePath;
        }

        $user->update($data);

        return back()->with('success', 'User updated successfully!');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User deleted successfully!');    }

        public function storeAddress(Request $request)
        {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'company_name' => 'nullable|string|max:255',
                'country' => 'required|string|max:100',
                'address_line1' => 'required|string|max:255',
                'address_line2' => 'nullable|string|max:255',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'zip_code' => 'required|string|max:20',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'order_notes' => 'nullable|string|max:1000',
            ]);

            // Save the validated address details into the addresses table
            $address = new Address([
                'user_id' => auth()->id(),
                'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'], // Associate the address with the authenticated user
                'address_line1' => $validatedData['address_line1'],
                'address_line2' => $validatedData['address_line2'],
                'city' => $validatedData['city'],
                'state' => $validatedData['state'],
                'zip_code' => $validatedData['zip_code'],
                'country' => $validatedData['country'],
                'phone' => $validatedData['phone'],
                // Any other fields you want to store for the address
            ]);

            $address->save();

            // You can handle additional logic here, such as creating an order, sending a confirmation email, etc.
            // For example, you could store the 'order_notes' in a separate 'orders' table or use the address for shipping purposes.

            // Redirect back to the checkout page or success page with a success message
            return redirect()->back()->with('success', 'Address saved successfully! Your order will be processed.');
        }
}
