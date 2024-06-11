<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiController;
use App\Models\User;


Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    // Auth routes
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
        Route::get('kategori', [KategoriController::class, 'index']);
        Route::get('kategori/{id_kategori}/product', [KategoriController::class, 'getProductsByCategoryId']);
        Route::get('product/all', [KategoriController::class, 'getProductsByCategoryId']);


        Route::get('merk', [MerkController::class, 'index']);
        Route::post('merk', [MerkController::class, 'store']);
        Route::get('merk/all', [MerkController::class, 'show']);
        Route::put('merk/{id}', [MerkController::class, 'update']);
        Route::delete('merk/{id}', [MerkController::class, 'destroy']);
        Route::get('merk/{id_merk}/product', [MerkController::class, 'getProductsByMerkId']);
        Route::get('merk/all', [MerkController::class, 'getAllMerk']);
        Route::get('/merk/updateimg', [MerkController::class, 'update']);

        Route::get('products', [ProductController::class, 'index']); // Get all products
        Route::post('product', [ProductController::class, 'store']); // Create a new product
        Route::get('product/{id_product}', [ProductController::class, 'show']); // Get a single product by ID
        Route::put('product/{id}', [ProductController::class, 'update']); // Update a product by ID
        Route::delete('product/{id}', [ProductController::class, 'destroy']); // Delete a product by I

        Route::post('/checkout', [TransaksiController::class, 'checkout'])->middleware('auth:api');


Route::prefix('auth')->group(function () {

});


Route::get('/users/{id}', function ($id) {
    return User::findOrFail($id);
});

});

