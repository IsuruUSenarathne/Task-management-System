<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $task = Task::create($request->only('title', 'status', 'description'));

        return redirect()->route('dashboard');
    }

    // Fetch all tasks
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }
}
