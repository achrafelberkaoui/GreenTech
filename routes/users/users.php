<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class);
Route::get('users.exportUser',[UserController::class, 'exportUser'])->name('users.exportUser');