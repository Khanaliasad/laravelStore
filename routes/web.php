<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', function () {
    // return view('pages.welcome');
    return view('pages.home');
})->name('index');

Route::get('/catalog/{category}', function (string $category) {
    return view('pages.home');
})->whereAlpha('category');
Route::get('/product/{sku}', [App\Http\Controllers\ProductController::class, 'index'])->whereAlphaNumeric('sku');

// Route::get('/about', 'PageController@about');
Route::get('/about', [PageController::class, 'about'])->middleware('abc');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/contact', [PageController::class, 'contact'])->name("contact");

Route::get('/cart', function () {
    return view('pages.cart');
});

Route::get('/checkout', function () {
    return view('pages.checkout');
});