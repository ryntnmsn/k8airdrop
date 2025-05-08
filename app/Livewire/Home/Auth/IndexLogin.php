<?php

namespace App\Livewire\Home\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class IndexLogin extends Component
{

    public $k8_username, $password, $remember;

    protected $rules = [
        'k8_username' => 'required|max:255|min:3',
        'password' => 'required|max:255|min:6',
    ];

    public function login() {
        $this->validate();

        $credentials = [
            'k8_username' => $this->k8_username,
            'password' => $this->password,
        ];
        
        // dd($credentials);
        if(Auth::attempt($credentials)) {
            if($this->remember == true) {
                Cookie::queue('k8_username', $this->k8_username);
                Cookie::queue('password', $this->password);
            } else {
                Cookie::queue('k8_username', '');
                Cookie::queue('password', '');
            }
            return $this->redirectRoute('user.dashboard');
        } else {
            session()->flash('error', 'Invalid credentials');
        }
    }

    public function mount() {
        $this->k8_username = Cookie::get('k8_username');
        $this->password = Cookie::get('password');
        // dd($this->k8_username);
        // $this->k8_username = request()->cookie('k8_username');
    }

    public function render()
    {
        return view('livewire.home.auth.index-login')
            ->extends('layouts.home.app')->section('contents');
    }
}
