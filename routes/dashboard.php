<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;

function getAllTasks()
{
    $userId = auth()->id();
    $tasks = Task::where('created_by', $userId)->get();
    return $tasks;
}

Route::get('/dashboard', function () {
    return view('dashboard', [
        'title' => 'Dashboard',
        'tasksByMe' => getAllTasks(),
        'tasksToMe' => null,
        'allTasks' => null
    ]);
})->name('dashboard')->middleware('custom.auth');
