<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);