<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'showLogin']);
Route::resource('products', ProductController::class);
Route::get('products.search', [ProductController::class, 'search'])->name('products.search');
Route::get('products.filter', [ProductController::class, 'filter'])->name('products.filter');
Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('login', [LoginController::class, 'autenticate']);
Route::get('register', [LoginController::class, 'showRegister'])->name('register');
Route::post('register', [LoginController::class, 'register']);


