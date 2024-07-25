<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



Route::post('/login', [AuthController::class, 'login']);

Route::get('produits', [ProductsController::class, 'index'])->name('produits.index');
Route::get('produits/{id}', [ProductsController::class, 'show'])->name('produits.show');

Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('categories/{id}', [CategoriesController::class, 'show'])->name('categories.show');


Route::middleware('auth:sanctum')->group(function () {
    // ############ Products ######################
    Route::get('produits/create', [ProductsController::class, 'create'])->name('produits.create');
    Route::post('produits', [ProductsController::class, 'store'])->name('produits.store');
    Route::get('produits/{id}/edit', [ProductsController::class, 'edit'])->name('produits.edit');
    Route::put('produits/{id}', [ProductsController::class, 'update'])->name('produits.update');
    Route::delete('produits/{id}', [ProductsController::class, 'destroy'])->name('produits.destroy');

    // ########### Categories ######################
    Route::get('categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    // ################ Image Upload ################
    Route::post('/upload-image', [ImageController::class, 'uploadImage'])->name('upload.image');

    // ################ Logout #######################
    Route::post('/logout', [AuthController::class, 'logout']);
});
