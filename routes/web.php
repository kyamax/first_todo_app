<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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


// Route::resource("/tasks", TaskController::class);
Route::get("/tasks/index", [TaskController::class, "index"])->name("tasks.index");
Route::get("/tasks/create", [TaskController::class, "create"])->name("tasks.create");
Route::post("/tasks/store", [TaskController::class, "store"])->name("tasks.store");
Route::get("/tasks/{task}", [TaskController::class, "edit"])->name("tasks.edit");
Route::put("/tasks/{task}", [TaskController::class, "update"])->name("tasks.update");
Route::delete("/tasks/{task}", [TaskController::class, "destroy"])->name("tasks.destroy");

Route::get("/users/create", [UserController::class, "create"])->name("users.create");
Route::post("/users", [UserController::class, "store"])->name("users.store");

Route::get("/users/login", [AuthController::class, "loginForm"])->name("users.login");
Route::post("/users/login", [AuthController::class, "login"]);