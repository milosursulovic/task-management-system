<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use App\Models\Task;
use Illuminate\Http\Request;

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

    public function addTask()
    {
        $users = CustomUser::where('role', '<>', 'admin')->get();

        return view('addEditTask', [
            'title' => 'Add Task',
            'task' => null,
            'users' => $users
        ]);
    }

    public function saveTask(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'required|date_format:Y-m-d\TH:i',
            'assigned_to' => 'required|exists:custom_users,id'
        ]);

        $task = new Task;
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->due_date = $validatedData['due_date'];
        $task->assigned_to = $validatedData['assigned_to'];
        $task->created_by = auth()->id();
        $task->completed = false;
        $task->save();

        return redirect('/dashboard');
    }

    public function editTask(Request $request)
    {
        $users = CustomUser::where('role', '<>', 'admin')->get();
        $task = Task::find($request->id);

        return view('addEditTask', [
            'title' => 'Edit Task',
            'task' => $task,
            'users' => $users,
            'assignedTo' => $task->assigned_to
        ]);
    }

    public function saveEditedTask(Request $request)
    {
        $task = Task::findOrFail($request->id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->assigned_to = $request->assigned_to;
        $task->save();

        return redirect('/dashboard');
    }

    public function deleteTask()
    {
    }
}
