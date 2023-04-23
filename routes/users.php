<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\CustomUser;

Route::get('/users', function () {
    $users = CustomUser::where('role', '<>', 'admin')->get();
    return view('dashboard', [
        'title' => 'Dashboard',
        'users' => $users,
        'tasks' => null,
        'tasksByMe' => null,
        'tasksToMe' => null,
        'allTasks' => null
    ]);
})->name('users')->middleware('custom.auth');

Route::delete('/users/{id}', function (Request $request) {
    $user = CustomUser::find($request->id);
    $user->delete();
    return redirect('/users');
})->name('deleteUser');
