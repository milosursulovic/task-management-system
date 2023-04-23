<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/tasks/byme', [TasksController::class, 'getByMeTasks'])->name('byMe');
Route::get('/tasks/tome', [TasksController::class, 'getToMeTasks'])->name('toMe');
Route::get('/tasks/all', [TasksController::class, 'getAllTasks'])->name('allTasks');
Route::get('/tasks/add', [TasksController::class, 'addTask'])->name('addTask');
Route::post('/tasks/add', [TasksController::class, 'saveTask'])->name('saveTask');
Route::get('/tasks/{id}', [TodoController::class, 'editTask'])->name('editTodo');
Route::patch('/tasks/{id}', [TodoController::class, 'saveEditedTask'])->name('saveEditedTask');
Route::delete('/tasks/{id}', [TodoController::class, 'deleteTask'])->name('deleteTask');