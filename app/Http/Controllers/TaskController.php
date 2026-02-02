<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {


        $tasks = Auth::user()->tasks()->get();
        // dd($tasks );

        $statistics = [
            'total' => $tasks->count(),
            'todo' => $tasks->where('status', 'todo')->count(),
            'inProgress' => $tasks->where('status', 'inProgress')->count(),
            'done' => $tasks->where('status', 'done')->count(),
            'overdue' => $tasks->where('deadline', '<', now())->where('status', '!=', 'done')->count(),
        ];
        //  dd($tasks);

        return view('dashboard', compact('tasks', 'statistics'));
    }
    public function create()
    {
        return view('tasks-create');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date|after_or_equal:today',
            'priority' => 'required|in:basse,moyenne,haute',
            'status' => 'required|in:todo,in_progress,done',
        ]);

        Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'deadline' => $validated['deadline'] ?? null,
            'priority' => $validated['priority'],
            'status' => $validated['status'],
            'user_id' => auth()->id(),
        ]);
        //    'title',            $table->enum('priority', ['basse', 'moyenne', 'haute'])->default('moyenne');

        // 'description',
        // 'deadline',
        // 'priority',
        // 'status',
        // 'user_id',

        return redirect()->route('dashboard')->with('success', 'Task created successfully!');
    }

    public function edit(Task $task)
    {
        return view('tasks-update', compact('task'));
    }


    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date|after_or_equal:today',
            'priority' => 'required|in:basse,moyenne,haute',
            'status' => 'required|in:todo,in_progress,done',
        ]);

        $task = Task::findOrFail($id);

        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'deadline' => $validated['deadline'] ?? null,
            'priority' => $validated['priority'],
            'status' => $validated['status'],
            'user_id' => auth()->id(),
        ]);


        //  $task->update($request->only(['title','description','deadline','priority','status']));


        return redirect()->route('dashboard')->with('success', 'Task updated successfully !');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return back()->with('success', 'Task archived.');
    }
    public function restore($id)
    {
        $task = Task::onlyTrashed()
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $task->restore();

        return back()->with('success', 'Task restored.');
    }
}
