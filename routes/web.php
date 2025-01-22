<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TaskManager;
use Illuminate\Support\Facades\Route;



// Route for Login
Route::get('login', [AuthManager::class, 'login'])->name('login');
// Route for Post request to the login
Route::post('login', [AuthManager::class, 'loginPost'])->name("login.post");

// Route for Logout
Route::get('logout', [AuthManager::class, 'logout'])->name('logout');


// Route for Register
Route::get('register', [AuthManager::class, 'register'])->name('register');
// Route for Post request to the register
Route::post('register', [AuthManager::class, 'registerPost'])->name("register.post");


// ADD task
Route::middleware("auth")->group(function () {

    // After login re-directed to Home
    // Route::get('/', function () {
    //     return view('welcome');
    // })->name('home');

    Route::get('/', [TaskManager::class, "listTask"])
    ->name('home');


    // task list
    Route::get("task/add", [TaskManager::class, "listTask"])
    ->name("task.list");

    // for add task page
    Route::get("task/add", [TaskManager::class, "addTask"])
    ->name("task.add");

    // add task to the database
    Route::post("task/add", [TaskManager::class, "addTaskPost"])
    ->name("task.add.post");

    // for update tasks status
    Route::get("task/status/{id}", [TaskManager::class, "updateTaskStatus"])
    ->name("task.status.update");

    // for deleting tasks
    Route::get("task/delete/{id}", [TaskManager::class, "deleteTask"])
    ->name("task.delete");

});