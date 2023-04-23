<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/tasks/byme', [TasksController::class, 'getByMeTasks'])->name('byMe');
Route::get('/tasks/tome', [TasksController::class, 'getToMeTasks'])->name('toMe');
Route::get('/tasks/all', [TasksController::class, 'getAllTasks'])->name('allTasks');
Route::get('/tasks/add', [TasksController::class, 'addTask'])->name('addTask');
Route::post('/tasks/add', [TasksController::class, 'saveTask'])->name('saveTask');
Route::get('/tasks/{id}', [TasksController::class, 'editTask'])->name('editTask');
Route::patch('/tasks/{id}', [TasksController::class, 'saveEditedTask'])->name('saveEditedTask');
Route::delete('/tasks/{id}', [TasksController::class, 'deleteTask'])->name('deleteTask');
Route::post('/tasks/complete/{id}', [TasksController::class, 'completeTask'])->name('complete');