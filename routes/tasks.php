<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/tasks/byme', [TasksController::class, 'getByMeTasks'])->name('byMe')->middleware('custom.auth');
Route::get('/tasks/tome', [TasksController::class, 'getToMeTasks'])->name('toMe')->middleware('custom.auth');
Route::get('/tasks/all', [TasksController::class, 'getAllTasks'])->name('allTasks')->middleware('custom.auth');
Route::get('/tasks/add', [TasksController::class, 'addTask'])->name('addTask')->middleware('custom.auth');
Route::post('/tasks/add', [TasksController::class, 'saveTask'])->name('saveTask');
Route::get('/tasks/{id}', [TasksController::class, 'editTask'])->name('editTask')->middleware('custom.auth');
Route::patch('/tasks/{id}', [TasksController::class, 'saveEditedTask'])->name('saveEditedTask');
Route::delete('/tasks/{id}', [TasksController::class, 'deleteTask'])->name('deleteTask');
Route::post('/tasks/complete/{id}', [TasksController::class, 'completeTask'])->name('complete');