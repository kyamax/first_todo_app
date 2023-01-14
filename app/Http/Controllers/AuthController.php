<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view("users.login");
    }

    public function login(LoginUserRequest $request)
    {
        $loginValidated = $request->validated();

        if(Auth::attempt($loginValidated, true)){
            $request->session()->regenerate();
            return redirect()->intended('/tasks/index');
        }
        return back()->onlyInput('email');

    }
}
