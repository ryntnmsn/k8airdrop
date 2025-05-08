<?php

namespace App\Livewire\Home;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class IndexUserAccount extends Component
{

    public $userID, $name, $email, $k8_username, $password, $password_confirmation;


    public function mount() {
        $this->userID = auth()->user()->id;
        $user = User::where('id', $this->userID)->first();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->k8_username = $user->k8_username;
    }

    public function updateUser() {

        $validate_array = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ];


        if($this->password != null) {
            $validate_array = [
                'name' => 'required|max:255',
                'password' => 'required|max:255|confirmed|min:6',
                'password_confirmation' => 'required|min:6|max:255'
            ];
        }

        $this->validate($validate_array);

        $user = User::where('id', $this->userID)->first();
        $user->update([
            'name' => $this->name,
            'password' => Hash::make($this->password)
        ]);

        session()->flash('success', 'Information updated successfully');
    }

    public function render()
    {
        return view('livewire.home.index-user-account')
            ->extends('layouts.home.app')->section('contents');
    }
}