<?php
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/login', [AuthController::class, 'login']);

Route::get('produits', [ProductsController::class, 'index'])->name('produits.index');
Route::get('produits_en_promo', [ProductsController::class, 'produits_en_promo'])->name('produits.produits_en_promo');
Route::get('produits/{id}', [ProductsController::class, 'show'])->name('produits.show');
Route::get('produits/by_sub_category/{id}', [ProductsController::class, 'show_by_categorie'])->name('produits.show_by_categorie');
Route::get('produits/by_category/{id}', [ProductsController::class, 'show_by_categorie_parent'])->name('produits.show_by_categorie_parent');

Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('categories/{id}', [CategoriesController::class, 'show'])->name('categories.show');
Route::get('categories/slug/{slug}', [CategoriesController::class, 'show_by_slug'])->name('categories.show_by_slug');

Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('contact/nbr_new',[ContactController::class, 'new_messages'])->name('contact.new_messages');

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

    // ################ Contact info ####################
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/{id}', [ContactController::class, 'show'])->name('contact.show');
    Route::put('contact/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

});
