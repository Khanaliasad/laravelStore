<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'home'])->name('index');

Route::get('/catalog/{category}', [CategoryController::class, 'index'])->name("catalog.show");

Route::get('/product/{id}', [ProductController::class, 'index'])->whereNumber('id')->name("product.page");

// Route::get('/about', 'PageController@about');
Route::get('/about', [PageController::class, 'about'])->middleware('abc');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/contact', [PageController::class, 'contact'])->name("contact");
//Route::post('/contact', [PageController::class, 'postcontact'])->name("contact");

Route::get('/cart', [PageController::class, 'cart'])->name("cart");

Route::get('/checkout', [PageController::class, 'checkout'])->name("checkout");
Route::post('/checkout', [PageController::class, 'order'])->name("order");
