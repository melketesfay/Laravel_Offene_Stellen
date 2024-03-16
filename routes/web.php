<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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

// All Listitems

Route::get('/', [ListingController::class, 'index']);



// show create Form

Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');


// Store Listing Data

Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');




// Show user register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create new user
Route::post('/users', [UserController::class, 'store']);

// Logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show Login form

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// show Login form

Route::post('/users/authenticate', [UserController::class, 'authenticate']);



// Manage Listings

Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Show single List items
Route::get('/listings/{listing}', [ListingController::class, 'show']);
