<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Models\CustomUser;

function getAllTasksByMe()
{
    $userId = auth()->id();
    $tasks = Task::where('created_by', $userId)->get();
    return $tasks;
}

function getAllUsers()
{
    $users = CustomUser::where('role', '<>', 'admin')->get();
    return $users;
}

Route::get('/dashboard', function () {
    if (auth()->user()->role == 'admin') {
        return view('dashboard', [
            'title' => 'Dashboard',
            'users' => getAllUsers(),
            'tasks' => null,
            'tasksByMe' => null,
            'tasksToMe' => null,
            'allTasks' => null
        ]);
    }

    return view('dashboard', [
        'title' => 'Dashboard',
        'users' => null,
        'tasks' => null,
        'tasksByMe' => getAllTasksByMe(),
        'tasksToMe' => null,
        'allTasks' => null
    ]);
})->name('dashboard')->middleware('custom.auth');
