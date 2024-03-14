<?php

namespace App\Livewire\Home\Wheel;

use Livewire\Component;

class SpinWheel extends Component
{

    public function spinWheel() {
        
    }

    public function render()
    {
        return view('livewire.home.wheel.spin-wheel')
            ->extends('layouts.home.app')->section('contents');
    }
}
