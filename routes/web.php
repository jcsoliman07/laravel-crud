<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::prefix('/products')->group(function()
// {
//     Route::get('/', [ProductController::class, 'index'])->name('products.index');
//     Route::post('/store', [ProductController::class, 'store'])->name('products.store');
//     Route::put('/edit/{product}', [ProductController::class, 'update'])->name('products.update');
//     Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
// });

Route::resource('/products', ProductController::class) ->except(['show']);
Route::resource('/categories', CategoryController::class) ->except(['show']);