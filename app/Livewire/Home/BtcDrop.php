<?php

namespace App\Livewire\Home;
use Illuminate\Support\Facades\Redirect;

use Livewire\Component;

class BtcDrop extends Component
{


    public function login() {
        Redirect::setIntendedUrl(url()->previous());
        return view('livewire.home.auth.index-login');

    }


    public function register() {
        Redirect::setIntendedUrl(url()->previous());
        return view('livewire.home.auth.index-register');
    }


    public function render()
    {


        return view('livewire.home.btc-drop',)->extends('layouts.home.app')->section('contents');
    }
}
