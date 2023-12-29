<?php

use App\Http\Controllers\PostController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [ProductController::class, 'cachePost'])->name('cache_post');
Route::get('items', [ProductController::class, 'item'])->name('item');
Route::get('clear', [ProductController::class, 'clear'])->name('cache_clear');
Route::post('store', [ProductController::class, 'store'])->name('products.store');


