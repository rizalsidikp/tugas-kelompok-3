<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/product/create_product', [\App\Http\Controllers\ProductController::class, 'create_product'])->name('create_product')->middleware('auth');
Route::post('/product/create_product', [\App\Http\Controllers\ProductController::class, 'store_product'])->name('store_product')->middleware('auth');
Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index_product'])->name('index_product')->middleware('auth');
Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'show_product'])->name('show_product')->middleware('auth');
Route::get('/product/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit_product'])->name('edit_product')->middleware('auth');
Route::patch('/product/{product}/update', [\App\Http\Controllers\ProductController::class, 'update_product'])->name('update_product')->middleware('auth');
Route::delete('/product/{product}', [\App\Http\Controllers\ProductController::class, 'delete_product'])->name('delete_product')->middleware('auth');


Route::post('/cart/{product}', [\App\Http\Controllers\CartController::class, 'add_to_cart'])->name('add_to_cart')->middleware('auth');