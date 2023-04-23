<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\CustomUser;

Route::get('/', function () {})->middleware('custom.auth');

Route::delete('/users/{id}', function (Request $request) {
    $user = CustomUser::find($request->id);
    $user->delete();
    return redirect('/dashboard');
})->name('deleteUser');