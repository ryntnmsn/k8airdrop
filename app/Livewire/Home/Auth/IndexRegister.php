<?php

namespace App\Livewire\Home\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class IndexRegister extends Component
{

    public $name, $email, $k8_username, $password, $password_confirmation, $terms = true;

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|min:4|unique:users,email',
        'k8_username' => 'required|max:255|min:3|unique:users,k8_username',
        'password' => 'required|max:255|confirmed|min:6',
        'password_confirmation' => 'required|min:6|max:255'
    ];

    // public function updated($propertyName){
    //     $this->validateOnly($propertyName);
    // }

    public function store() {
        $this->validate();
        
        if($this->terms == true) {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'k8_username' => $this->k8_username,
                'role' => false,
                'password' => Hash::make($this->password),
            ]);
            
            $this->reset();
            $this->redirectRoute('user.login');
        } else {
            session()->flash('terms_message', 'Please confirm terms of service.');
        }
     
    }
    
    public function render()
    {
        return view('livewire.home.auth.index-register')
        ->extends('layouts.home.app')->section('contents');
    }
}
