<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::middleware(['staff', 'admin', 'addUserData'])->group(function () {
  Route::get('/product/create_product', [\App\Http\Controllers\ProductController::class, 'create_product'])->name('create_product');
  Route::post('/product/create_product', [\App\Http\Controllers\ProductController::class, 'store_product'])->name('store_product');
  Route::get('/product/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit_product'])->name('edit_product');
  Route::patch('/product/{product}/update', [\App\Http\Controllers\ProductController::class, 'update_product'])->name('update_product');
  Route::delete('/product/{product}', [\App\Http\Controllers\ProductController::class, 'delete_product'])->name('delete_product');
  Route::post('/order/{order}/confirm', [\App\Http\Controllers\OrderController::class, 'confirm_payment'])->name('confirm_payment');

});

Route::middleware(['admin', 'addUserData'])->group(function () {

});

Route::middleware(['auth', 'addUserData'])->group(function () {
  Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
  Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index_product'])->name('index_product');
  Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'show_product'])->name('show_product');
 
  Route::post('/cart/{product}', [\App\Http\Controllers\CartController::class, 'add_to_cart'])->name('add_to_cart');
  Route::get('/cart', [\App\Http\Controllers\CartController::class, 'show_cart'])->name('show_cart');
  Route::patch('/cart/{cart}', [\App\Http\Controllers\CartController::class, 'update_cart'])->name('update_cart');
  Route::delete('/cart/{cart}', [\App\Http\Controllers\CartController::class, 'delete_cart'])->name('delete_cart');

  Route::post('/checkout', [\App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');
  Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index_order'])->name('index_order');
  Route::get('/order/{order}', [\App\Http\Controllers\OrderController::class, 'show_order'])->name('show_order');
  Route::post('/order/{order}/pay', [\App\Http\Controllers\OrderController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');
});