<?php

namespace App\Livewire\Admin\Wheel;

use App\Models\Subscription;
use App\Models\UserSpin;
use Livewire\Component;

class SpinUsers extends Component
{
    public function render()
    {

        $users = UserSpin::all();

        return view('livewire.admin.wheel.spin-users', [
            'users' => $users
        ])->extends('layouts.admin.app')->section('contents');
    }
}
