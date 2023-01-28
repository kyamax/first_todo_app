<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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



Route::prefix("/tasks")
    ->name("tasks.")
    ->group(function(){
        Route::middleware("auth")
            ->group(function(){
                // Route::resource("/tasks", TaskController::class)->except("show");
                Route::get("/index", [TaskController::class, "index"])->name("index");
                Route::get("/done", [TaskController::class, "done"])->name("done");
                Route::get("/show/{task}", [TaskController::class, "show"])->name("show");
                Route::get("/create", [TaskController::class, "create"])->name("create");
                Route::post("/store", [TaskController::class, "store"])->name("store");
                Route::get("/{task}", [TaskController::class, "edit"])->name("edit");
                Route::put("/{task}", [TaskController::class, "update"])->name("update");
                Route::delete("/{task}", [TaskController::class, "destroy"])->name("destroy");
                Route::post("/{task}", [TaskController::class, "check"])->name("check");

            });
        });

Route::get("/users/create", [UserController::class, "create"])->name("users.create");
Route::post("/users", [UserController::class, "store"])->name("users.store");

Route::get("/users/login", [AuthController::class, "loginForm"])->name("users.login");
Route::post("/users/login", [AuthController::class, "login"]);
Route::post("/users/logout", [AuthController::class, "logout"])->name("users.logout");
