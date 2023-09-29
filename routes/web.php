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

Route::get('/', [PageController::class, 'home' ] )->name('index');

Route::get('/catalog/{category}', [\App\Http\Controllers\CategoryController::class, 'index'] )->name("catalog.show");

Route::get('/product/{sku}', [App\Http\Controllers\ProductController::class, 'index'])->whereAlphaNumeric('sku')->name("product.page");

// Route::get('/about', 'PageController@about');
Route::get('/about', [PageController::class, 'about'])->middleware('abc');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/contact', [PageController::class, 'contact'])->name("contact");
//Route::post('/contact', [PageController::class, 'postcontact'])->name("contact");

Route::get('/cart', function () {
    return view('pages.cart');
})->name("cart");

Route::get('/checkout', function () {
    return view('pages.checkout');
})->name("checkout");
