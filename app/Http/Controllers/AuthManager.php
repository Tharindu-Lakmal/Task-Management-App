<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// functions for logging and registration
class AuthManager extends Controller
{
    // Loging function
    function login() {
        return view("auth.login");
    }

    // function for posting
    function loginPost() {

    }

}
