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
        $tasks = Task::all();
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
        // 一括代入
        $task = new Task($request->validated());
        // $task["user_id"] = $request->Auth::id();
        $task->user_id = Auth::id();
        $task->save();

        return to_route("tasks.index")->with("success", "TODOを追加しました");
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

        return to_route("tasks.index")->with("success", "内容を更新しました");
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return to_route("tasks.index")->with("success", "削除されました");
    }
}
