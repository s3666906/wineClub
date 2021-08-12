<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Home Page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
// Contact Us
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact']);

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store']);
// About Us
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
// Wine Club
Route::get('/wineclub', [App\Http\Controllers\HomeController::class, 'wineclub']);

//  Category Page
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
// Product Page
Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'show']);
// New Product Review
Route::post('/products/{product}/review', [App\Http\Controllers\ProductController::class, 'review']);

// Events
Route::get('/events', [App\Http\Controllers\EventController::class, 'index']);
// Events
Route::post('/events/store', [App\Http\Controllers\EventController::class, 'store']);

// User Account
Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', [App\Http\Controllers\UserController::class,'account']);
});
