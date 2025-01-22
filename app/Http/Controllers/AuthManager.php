<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// functions for logging and registration
class AuthManager extends Controller
{
    // Loging function
    function login() {
        return view("auth.login");
    }

    // function for Post request to the login
    function loginPost( Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended(route("home"));
        }
        return redirect(route('login'))->with('error', 'Invalid Email or Password');
    }


    // function for logout
    function logout() {
        Auth::logout();
        return redirect(route('login'));
    }




    // function for registration
    function register() {
        return view('auth.register');
    }

    // post request for register
    function registerPost(Request $request) {
        $request->validate([
            'fullname' => 'required',
            'email'=> 'required|email',
            'password'=> 'required|min:8',
        ]);

        // create a user model
        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = $request->password;

        // check credential validity
        if($user->save()) {
            return redirect(route('login'))
            ->with('success','Registration Successfull!');
        } else {
            return redirect(route('register'))
            ->with('error', "Registration Failed") ;
        }
    }

}
