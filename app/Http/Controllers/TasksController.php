<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TasksController extends Controller
{
    public function getByMeTasks()
    {
        $userId = auth()->id();
        $tasks = Task::where('created_by', $userId)->get();
        return view('dashboard', [
            'title' => 'Dashboard',
            'tasksByMe' => $tasks,
            'tasksToMe' => null,
            'allTasks' => null
        ]);
    }

    public function getToMeTasks()
    {
        $userId = auth()->id();
        $tasks = Task::where('assigned_to', $userId)->get();
        return view('dashboard', [
            'title' => 'Dashboard',
            'tasksByMe' => null,
            'tasksToMe' => $tasks,
            'allTasks' => null
        ]);
    }

    public function getAllTasks()
    {
        $tasks = Task::all();
        return view('dashboard', [
            'title' => 'Dashboard',
            'tasksByMe' => null,
            'tasksToMe' => null,
            'allTasks' => $tasks
        ]);
    }
}
