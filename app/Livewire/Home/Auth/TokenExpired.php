<?php

namespace App\Livewire\Home\Auth;

use Livewire\Component;

class TokenExpired extends Component
{
    public function render()
    {
        return view('livewire.home.auth.token-expired')
            ->extends('layouts.home.app')->section('contents');
    }
}
