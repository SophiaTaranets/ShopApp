<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [HomeController::class, 'index'])->middleware('auth');


Route::get('/products',[ProductController::class, 'store'])->name('product.store')->middleware('auth');


Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'create'])->name('orders.create');


Route::get('/shopping_cart',[ShoppingCartController::class, 'index'])->name('shopping_cart.index');
Route::post('/create/shopping_cart', [ShoppingCartController::class,'create'])->name('shopping_cart.create');
Route::delete('/shopping_cart/{id}', [ShoppingCartController::class,'delete'])->name('shopping_cart.delete');
Route::get('/login', [LoginController::class, 'login'])->name('login');





Auth::routes();






Auth::routes();




