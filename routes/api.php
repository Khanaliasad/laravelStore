<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('cart')->group(function () {
    Route::get('get', [CartController::class, 'getCart']);
    Route::post('add', [CartController::class, 'addToCart']);
    Route::delete('remove/{cartId}/{cartItemId}', [CartController::class, 'removeFromCart']);
//    Route::put('update/{id}', 'App\Http\Controllers\CartController@updateCart');
});
