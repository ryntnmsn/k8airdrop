<?php

namespace App\Livewire\Home\Auth;

use Livewire\Component;

class IndexLogin extends Component
{
    public function render()
    {
        return view('livewire.home.auth.index-login')
            ->extends('layouts.home.app')->section('contents');
    }
}
