<?php

namespace App\Livewire\Home\Wheel;

use App\Models\UserSpin;
use Livewire\Component;

class SpinWheelDashboard extends Component
{

    public $spinWheels;

    public function mount() {
        $userID = auth()->user()->id;
        $this->spinWheels = UserSpin::where('user_id', $userID)->get();
    }

    public function render()
    {
        return view('livewire.home.wheel.spin-wheel-dashboard')
            ->extends('layouts.home.app')->section('contents');
    }
}
