<?php

namespace App\Livewire\Home;

use Livewire\Component;

class IndexDashboard extends Component
{
    public function render()
    {
        return view('livewire.home.index-dashboard')
            ->extends('layouts.home.app')->section('contents');
    }
}
