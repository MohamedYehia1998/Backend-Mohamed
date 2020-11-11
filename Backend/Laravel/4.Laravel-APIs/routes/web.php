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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group([
    'middleware' => ['auth:sanctum', 'verified'] ,
    'prefix' => 'admin',
    'as' => 'admin.'
], function (){
    Route::get('category/search', [\App\Http\Controllers\CategoryController::class, 'search'])->name('category.search');
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::get('product/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('product.search');
    Route::resource('product', \App\Http\Controllers\ProductController::class);
});
