<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{

    public function showRegisterForm()
    {
        return view('mainPages.reg');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => Role::where('name', 'user')->first()->id,
        ]);

        Auth::login($user);
        session()->flash('success', 'Your account has been created successfully! Please log in.');

        return redirect()->route('login.form');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('mainPages.login');
    }

    // Handle the login process
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            if (auth()->user()->role->name === 'Admin') {
                return redirect()->route('index'); // Redirect to admin dashboard
            } elseif (auth()->user()->role->name === 'User') {
                return redirect()->route('homePage'); // Redirect to user dashboard
            } else {
                return redirect()->route('homePage'); // Default redirect if no specific role
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function loginCheckOut(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return back(); // Redirect to home page after login
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Handle the logout process
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Redirect to login page after logout
    }
}
