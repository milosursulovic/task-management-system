<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard', [
        'title' => 'Dashboard'
    ]);
})->name('dashboard')->middleware('custom.auth');