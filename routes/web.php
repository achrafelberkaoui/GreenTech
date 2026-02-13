<?php

use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\UserIsAdmin;
use App\Http\Middleware\UserIsClient;

Route::get('/', [ProductController::class, 'index']);
Route::middleware(['auth', UserIsAdmin::class])->group(function(){
    Route::resource('products', ProductController::class)->except(['index', 'show']);
});
Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::get('products.search', [ProductController::class, 'search'])->name('products.search');
Route::get('products.filter', [ProductController::class, 'filter'])->name('products.filter');

Route::middleware(['auth', UserIsClient::class])->group(function(){
Route::post('favorites/{product}', [FavoriteController::class, 'toggleFavorite'])->name('favorite.toggleFavorite');
Route::get('favorites', [FavoriteController::class, 'index'])->name('favorite.index');
});

@include('auth/auth.php');
@include('users/users.php');
@include('roles/roles.php');