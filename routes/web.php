<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route for Login
Route::get('login', [AuthManager::class, 'login']);