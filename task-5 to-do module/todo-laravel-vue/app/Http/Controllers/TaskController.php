<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $valid = $request->validate(
            [
                'title' => 'required'
            ]
        );


        if(!$valid){
             return response()->json();
        }else{
            $task = Task::create([
                'title' => $request->title,
                'status' => 0
            ]);
            return response()->json($task);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
  
        $task = Task::findOrFail($request->id);
        $task->update([
            'status' => $request->status
        ]);

        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task = Task::findOrFail($task->id);
        $task->delete();
        return response()->json($task);
    }
}
