<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\ProductController;
use App\Models\User;


Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    // Auth routes
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
        Route::get('kategori', [KategoriController::class, 'index']);
        Route::post('kategori', [KategoriController::class, 'store']);
        Route::get('kategori/{id}', [KategoriController::class, 'show']);
        Route::put('kategori/{id}', [KategoriController::class, 'update']);
        Route::delete('kategori/{id}', [KategoriController::class, 'destroy']);
        Route::get('kategori/{id_kategori}/product', [KategoriController::class, 'getProductsByCategoryId']);
        // Menampilkan semua produk dari berbagai kategori
        Route::get('product/all', [KategoriController::class, 'getProductsByCategoryId']);

        Route::get('merk/{id_merk}/product', [MerkController::class, 'getProductsByMerkId']);
        Route::get('/merk/all', [MerkController::class, 'getAll']);

Route::get('/users/{id}', function ($id) {
    return User::findOrFail($id);
});

});

// Kategori routes
Route::get('kategori', [KategoriController::class, 'index']);
Route::post('kategori', [KategoriController::class, 'store']);
Route::get('kategori/{id}', [KategoriController::class, 'show']);
Route::put('kategori/{id}', [KategoriController::class, 'update']);
Route::delete('kategori/{id}', [KategoriController::class, 'destroy']);

// Merk routes
Route::get('merk', [MerkController::class, 'index']);
Route::post('merk', [MerkController::class, 'store']);
Route::get('merk/{id}', [MerkController::class, 'show']);
Route::put('merk/{id}', [MerkController::class, 'update']);
Route::delete('merk/{id}', [MerkController::class, 'destroy']);

// Product routes
Route::get('product', [ProductController::class, 'index']);
Route::post('product', [ProductController::class, 'store']);
Route::get('product/{id}', [ProductController::class, 'show']);
Route::put('product/{id}', [ProductController::class, 'update']);
Route::delete('product/{id}', [ProductController::class, 'destroy']);

// Route::middleware('auth:api')->group(function () {
//     Route::resource('product', ProductController::class);
// });

