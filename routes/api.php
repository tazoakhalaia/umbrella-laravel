<?php

use App\Http\Controllers\CreateCategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ProductController::class)->group(function(){
    Route::post('/product', 'store')->name('product.store');
    Route::get('/products', 'getProducts')->name('product.get');
    Route::delete('/products/{id}', 'destroy')->name('product.destory');
});

Route::controller(CreateCategoryController::class)->group(function(){
    Route::post('/category', 'store')->name('category.store');
    Route::get('/categories', 'getCategory')->name('categories.get');
});
