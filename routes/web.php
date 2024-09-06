<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route to show the registration form
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');

// Route to handle registration form submission
Route::post('register', [AuthController::class, 'register'])->name('register');

// Route to show the login form
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');

// Route to handle login form submission
Route::post('login', [AuthController::class, 'login'])->name('login');

// Route to handle logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/index', function () {
    return view('adminDashboard.index');
})->name('index');

Route::get('manageUsers', [UserController::class, 'index'])->name('manageUsers');



Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');






//----------------------------------------Test
use App\Http\Controllers\BookController;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('books.checkIsbn'); // Home page redirects to ISBN check
});

// Routes for BookController
Route::post('/books/check-isbn', [BookController::class, 'checkIsbn'])->name('books.checkIsbn');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/store', [BookController::class, 'store'])->name('books.store');

// Routes for InventoryController
Route::get('/inventory/accept-book/{book}', [InventoryController::class, 'acceptBook'])->name('inventory.acceptBook');
Route::post('/inventory/add', [InventoryController::class, 'addToInventory'])->name('inventory.addToInventory');
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');




