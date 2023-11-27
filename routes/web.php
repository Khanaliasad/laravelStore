<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;

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
Route::get('/about', [PageController::class, 'about'])->middleware('abc')->name("about");

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/contact', [PageController::class, 'contact'])->name("contact");
//Route::post('/contact', [PageController::class, 'postcontact'])->name("contact");

Route::get('/cart', [PageController::class, 'cart'])->name("cart");
/*Route::get('/logout', function (){
    Auth()->logout();
    return redirect('/');
});*/
Route::get('/checkout', [PageController::class, 'checkout'])->name("checkout");
Route::post('/checkout', [PageController::class, 'order'])->name("order");

//admin pages
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name("admin.dashboard");
Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name("admin.orders");
Route::get('/admin/order/detail/{id}', [AdminOrderController::class, 'show'])->name("admin.orderdetail");
Route::get('/admin/order/edit/{id}', [AdminOrderController::class, 'edit'])->name("admin.orderedit");

Route::get('/admin/products', [AdminProductController::class, 'index'])->name("admin.products");
Route::get('/admin/product/detail/{id}', [AdminProductController::class, 'show'])->name("admin.productdetail");
Route::get('/admin/product/edit/{id}', [AdminProductController::class, 'edit'])->name("admin.productedit");
Route::post('/admin/product/edit/{id}', [AdminProductController::class, 'update'])->name("admin.producteditpost");
Route::get('/admin/product/delete/{id}', [AdminProductController::class, 'destroy'])->name("admin.productdelete");
Route::post('/admin/product/image/upload', [\App\Http\Controllers\AdminImageUploadController::class, 'store'])->name("admin.uploadImage");
Route::post('/admin/product/Variant/delete', [\App\Http\Controllers\AdminImageUploadController::class, 'store'])->name("admin.uploadImage");

Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name("admin.category");
Route::get('/admin/category/{id}', [AdminCategoryController::class, 'edit'])->name("admin.categoryedit");
Route::post('/admin/category/create', [AdminCategoryController::class, 'create'])->name("admin.categorycreatepost");
Route::post('/admin/category/{id}', [AdminCategoryController::class, 'update'])->name("admin.categoryeditpost");
Route::get('/admin/category/delete/{id}', [AdminCategoryController::class, 'destroy'])->name("admin.categorydelete");
