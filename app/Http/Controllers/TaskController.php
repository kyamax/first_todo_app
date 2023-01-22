<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Importance;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where([
            ["user_id", Auth::user()->id],
            ["check", false],
            [function ($query){
                if ($search = request('search')) {
                    $query->where('title', 'LIKE', "%{$search}%");
            }}]
        ])->orderBy('created_at', 'desc')->paginate(7);


        $user = Auth::user();
        $importances = Importance::all();

        return view("tasks.index", ["tasks" => $tasks, "importances" => $importances, "user" => $user]);
        
    }


    public function create()
    {
        $importances = Importance::all();
        return view("tasks.create", [ "importances" => $importances]);
    }


    public function store(StoreTaskRequest $request)
    {
        $task = new Task($request->validated());
        $task->user_id = Auth::id();
        $task->save();

        return to_route("tasks.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $importances = Importance::all();

        return view("tasks.edit", ["task" => $task, "importances" => $importances]);
    }

    public function update(StoreTaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $updateData = $request->validated();

        $task->importance()->associate($updateData["importance_id"]);
        $task->update($updateData);

        return to_route("tasks.index");
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return to_route("tasks.index");
    }

    public function check($id)
    {
        $task = Task::findOrFail($id);
        // $task->check = ($task->check) ? 0 : 1;
        if($task->check == true){
            $task->check = false;
            $task->save();
            return to_route("tasks.done");
        } else {
            $task->check = true;
            $task->save();
            return to_route("tasks.index");
        }
    }

    public function done()
    {
        $tasks = Task::where([
            ["user_id", Auth::user()->id],
            ["check", true]
        ])->orderBy('created_at', 'desc')->paginate(7);

        $user = Auth::user();
        $importances = Importance::all();

        return view("tasks.done", ["tasks" => $tasks, "importances" => $importances, "user" => $user]);
        
    }
}
