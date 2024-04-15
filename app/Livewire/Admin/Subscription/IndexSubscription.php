<?php

namespace App\Livewire\Admin\Subscription;

use Livewire\Component;

class IndexSubscription extends Component
{
    public function render()
    {
        return view('livewire.admin.subscription.index-subscription')
            ->extends('layouts.admin.app')->section('contents');
    }
}
