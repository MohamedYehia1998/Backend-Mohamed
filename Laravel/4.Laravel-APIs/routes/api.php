<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test-api', function (){
   return [
       'name' => 'Mohamed'
   ];
});

Route::resource('category', \App\Http\Controllers\API\V1\CategoryController::class);

Route::group([
    //'middleware' => ['auth:sanctum', 'verified'] ,
    'prefix' => 'admin',
    'as' => 'api.admin.'
], function (){
    Route::get('category/search', [\App\Http\Controllers\API\V1\CategoryController::class, 'search'])->name('category.search');
    Route::resource('category', \App\Http\Controllers\API\V1\CategoryController::class);
    Route::get('product/search', [\App\Http\Controllers\API\V1\ProductController::class, 'search'])->name('product.search');
    Route::resource('product', \App\Http\Controllers\API\V1\ProductController::class);
});
