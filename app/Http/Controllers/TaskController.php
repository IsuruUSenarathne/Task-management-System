<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $userId = auth()->id();

        $task = Task::create([
            'title' => $request->title,
            'status' => $request->status,
            'description' => $request->description,
            'user_id' => $userId,
        ]);

        return redirect()->route('dashboard')->with('success', 'Task created successfully!');
    }

    // Fetch all tasks
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get();
        return response()->json($tasks);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully.']);
    }
}
