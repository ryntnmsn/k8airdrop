<?php

namespace App\Livewire\Home\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexLogin extends Component
{

    public $k8_username, $password;

    protected $rules = [
        'k8_username' => 'required|max:255|min:3',
        'password' => 'required|max:255|min:6',
    ];

    public function login() {
        $this->validate();

        $credentials = [
            'k8_username' => $this->k8_username,
            'password' => $this->password
        ];
        
        if(Auth::attempt($credentials)) {
            return $this->redirectRoute('home.index');
        } else {
            session()->flash('error', 'Invalid credentials');
        }
    }

    public function render()
    {
        return view('livewire.home.auth.index-login')
            ->extends('layouts.home.app')->section('contents');
    }
}
