<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {})->middleware('custom.auth');