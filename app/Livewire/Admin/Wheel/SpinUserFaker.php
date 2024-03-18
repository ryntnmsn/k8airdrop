<?php

namespace App\Livewire\Admin\Wheel;

use App\Models\UserFaker;
use Livewire\Component;

class SpinUserFaker extends Component
{
    public $userID='', $name='', $rewards='';

    protected $rules = [
        'name' => 'required|alpha_dash',
        'rewards' => 'required'
    ];

    public function addUserFaker() {
        $this->validate();
        UserFaker::create([
            'name' => $this->name,
            'rewards' => $this->rewards
        ]);
    }

    public function editUserFaker($id) {
        $user = UserFaker::where('id', $id)->first();
        $this->userID = $user->id;
        $this->name = $user->name;
        $this->rewards = $user->rewards;
    }

    public function updateUserFaker() {
        $this->validate();
        $user = UserFaker::findOrFail($this->userID);
        $user->update([
            'name' => $this->name,
            'rewards' => $this->rewards
        ]);
        
        $this->js('window.location.reload()');
    }

    public function render()
    {
        return view('livewire.admin.wheel.spin-user-faker', [
            'users' => UserFaker::all(),
        ])->extends('layouts.admin.app')->section('contents');
    }
}
