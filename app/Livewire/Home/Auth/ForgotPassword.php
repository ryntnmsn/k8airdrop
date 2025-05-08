<?php

namespace App\Livewire\Home\Auth;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;

class ForgotPassword extends Component
{

    public $email;

    public function forgot() {
        $user = User::where('email', $this->email)->first();
        if(!empty($user)) {
            $user->remember_token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            session()->flash('success', 'Password reset link sent successfully.');

        } else {
            session()->flash('error', 'Email not found');
        }
    }

    public function render()
    {

        return view('livewire.home.auth.forgot-password')
            ->extends('layouts.home.app')->section('contents');
    }
}
