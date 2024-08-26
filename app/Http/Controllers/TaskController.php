<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{

    public function showTasks()
    {
        if (Auth::check()) {
            $tasks = Auth::user()->tasks;
            return view('dashboard', compact('tasks'));
        } else {
            return redirect()->route('login');
        }
    }

    public function deleteTask(string $id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        return redirect()->route('tasks');
    }

    public function addtask()
    {
        return view('addtask');
    }

    public function storeTask(Request $request)
    {
        if (Auth::check()) {
            $task = Task::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'description' => $request->description,
                'priority' => $request->priority,
                'due_date' => $request->due_date,
                'attachments' => $request->attachments,
                'status' => $request->status,
                'notes' => $request->notes,
                'completed' => $request->completed,
            ]);

            return redirect()->route('tasks');
        } else {
            return redirect()->route('login');
        }
    }

    public function gotoupdatepage()
    {
        return view('updatetask');
    }

    public function updateTask(string $id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        return view('updatetask', compact('task'));
    }

    public function updateSave(Request $request, string $id)
    {
        DB::table('tasks')
            ->where('id', $id)
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'priority' => $request->priority,
                'due_date' => $request->due_date,
                'attachments' => $request->attachments,
                'status' => $request->status,
                'notes' => $request->notes,
                'completed' => $request->completed,
                'updated_at' => Carbon::now(),
            ]);

        return redirect()->route('tasks')->with('success', 'Task updated successfully');
    }
}
