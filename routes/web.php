<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resource Routes:
// index - show all listings
// show - show single listing
// create - show form to create listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// update - update listing
// delete - delete listing

// All listings
Route::get('/', [ListingController::class, 'index']);

// Route::get('/', function () {
//   return view('listings', [
//       'heading' => 'Latest Listings',
//       'listings' => Listing::all()
//   ]);
// });

// show create form
Route::get('/listings/create', [ListingController::class, 'create']);

// store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class,  'edit']);

//  Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//  Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register / Create Form
Route::get('/register', [UserController::class, 'create']);

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout']);

// Show Login Form
Route::get('/login', [UserController::class, 'login']);

// Log inUser
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

/* Route::get('/listings/{listing}', function(Listing $listing){  
//     return view('listing', [
//         'listing' => $listing
//     ]);
// });
// Route::get('/listings/{id}', function($id){
//   $listing = Listing::find($id);

//   if($listing){
//     return view('listing', [
//         'listing' => $listing
//     ]);
//   } else {
//     abort('404');
//   }
// });*/ 

// route examples
// Route::get('/hello', function(){
//     return response("<h1>Hello World</h1>", 200) -> header('Content-Type', 'text/plain');
// });

// Route::get('/posts/{id}', function($id){
//     // dd die and dump
//     dd($id);
//     // ddd die dump and debug
//     ddd($id);
//     return response('Post' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request){
//     dd($request);
//     return $request->name . ' ' . $request->city;
// });
