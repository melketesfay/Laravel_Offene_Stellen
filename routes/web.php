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

Route::get('/listings/create', [ListingController::class, 'create']);


// Store Listing Data

Route::post('/listings', [ListingController::class, 'store']);




// Show user register Form

Route::get('/register', [UserController::class, 'create']);

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Show single List items
Route::get('/listings/{listing}', [ListingController::class, 'show']);
