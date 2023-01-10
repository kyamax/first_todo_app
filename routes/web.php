<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('tasks.index');
});

Route::get("/tasks/index", [TaskController::class, "index"])->name("tasks.index");
Route::get("/tasks/create", [TaskController::class, "create"])->name("tasks.create");
Route::post("/tasks/store", [TaskController::class, "store"])->name("tasks.store");

