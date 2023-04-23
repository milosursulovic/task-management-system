<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {})->middleware('auth.custom');