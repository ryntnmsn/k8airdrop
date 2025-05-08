<?php

namespace App\Livewire\Home\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class ResetPassword extends Component
{

    public $token;
    public $password;
    public $confirmed_password;
    
    protected $rules = [
        'password' => 'required|min:6|max:255',
        'confirmed_password' => 'required|min:6|max:255',
    ];


    public function resetPassword() {
        $this->validate();
        $user = User::where('remember_token', $this->token)->first();
        $this->token = $user->remember_token ?? '';

        if($this->token == null || $this->token != $user->remember_token) {
            return redirect()->route('token.expired');
        } else {
            if(!empty($user)) {
                if($this->password == $this->confirmed_password) {
                    $user->password = Hash::make($this->password);
                    $user->remember_token = Str::random(40);
                    $user->save();
                    session()->flash('success', 'Password reset successfully');
    
                } else {
                    session()->flash('error', 'Password not match');
                }
            } else {
                abort(404);
            }
        }
    }

    public function mount($token) {
        $user = User::where('remember_token', $token)->first();
        $this->token = $user->remember_token ?? '';
        if($this->token == null || $this->token != $user->remember_token) {
            return redirect()->route('token.expired');
        }
    }

    public function render()
    {

        return view('livewire.home.auth.reset-password')
        ->extends('layouts.home.app')->section('contents');;
    }
}
