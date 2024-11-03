<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

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

    
    public function index(Request $request)
    {
        $status = $request->query('status', 'option1'); 

        $query = Task::where('user_id', auth()->id());

        if ($status !== 'option1') { // 
            $query->where('status', $status);
        }

        $tasks = $query->paginate(5);

        return response()->json($tasks);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully.']);
    }

    public function edit($id)
{
    $task = Task::findOrFail($id);

    return Inertia::render('TaskEdit', [
        'taskId' => $id,
        'taskData' => $task, 
    ]);
}

    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    

}