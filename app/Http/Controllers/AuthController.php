<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login(AuthUserRequest $request) {
       
            if(auth()->attempt(\request()->only(['email', 'password']))) {
                if(auth()->user()->role == '1') {
                    return redirect()->route('dashboard.index');
                }
            }
    
            return redirect()->back()->withErrors(['errorMsg' => 'Invalid credentials']);
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('auth.index');
    }

    public function userLogout() {
        auth()->logout();
        return redirect()->route('user.login');
    }
}
