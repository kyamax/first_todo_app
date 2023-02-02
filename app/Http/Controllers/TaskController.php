<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Importance;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');

        $tasks = Task::where([
            ["user_id", Auth::user()->id],
            ["check", false],
            ['title', 'LIKE', "%{$search}%"]
        ])->sortable()->orderBy('created_at', 'desc')->paginate(7);


        $user = Auth::user();
        $importances = Importance::all();

        return view("tasks.index", ["tasks" => $tasks, "importances" => $importances, "user" => $user, "search" => $search, "sort" => $sort]);

    }


    public function create()
    {
        $importances = Importance::all();
        return view("tasks.create", [ "importances" => $importances]);
    }


    public function store(StoreTaskRequest $request)
    {
        $task = new Task($request->all());
        $task->user_id = Auth::id();
        $task->save();

        return to_route("tasks.index");
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        $importances = Importance::all();
        
        return view("tasks.show", ["task" => $task, "importances" => $importances]);
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
        $updateData = $request->all();

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
        ])->sortable()->orderBy('created_at', 'desc')->paginate(7);

        $user = Auth::user();
        $importances = Importance::all();

        return view("tasks.done", ["tasks" => $tasks, "importances" => $importances, "user" => $user]);
        
    }
}
