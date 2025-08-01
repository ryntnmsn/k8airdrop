<?php

namespace App\Livewire\Home;
use Illuminate\Support\Facades\Redirect;

use Livewire\Component;

class TestGiveaways extends Component
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


        return view('livewire.home.test-giveaways',)->extends('layouts.home.app')->section('contents');
    }
}
