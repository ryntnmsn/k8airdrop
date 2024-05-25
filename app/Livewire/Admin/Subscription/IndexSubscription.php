<?php

namespace App\Livewire\Admin\Subscription;

use App\Models\Subscription;
use Livewire\Component;

class IndexSubscription extends Component
{
    public function render()
    {

        $users = Subscription::all();

        return view('livewire.admin.subscription.index-subscription',[
            'users' => $users
        ])->extends('layouts.admin.app')->section('contents');
    }
}
