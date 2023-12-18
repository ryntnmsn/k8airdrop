<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login(AuthUserRequest $request) {

        if(auth()->attempt(\request()->only(['email', 'password']))) {
            return redirect()->route('dashboard.index');
        }

        return redirect()->back()->withErrors(['errorMsg' => 'Invalid credentials']);

    }

    public function logout() {
        auth()->logout();
        return redirect()->route('auth.index');
    }
}
