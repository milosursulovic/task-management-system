<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/tasks/byme', [TasksController::class, 'getByMeTasks'])->name('byme');
Route::get('/tasks/tome', [TasksController::class, 'getToMeTasks'])->name('tome');
Route::get('/tasks/all', [TasksController::class, 'getAllTasks'])->name('alltasks');