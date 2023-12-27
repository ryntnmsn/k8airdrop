<?php

namespace App\Livewire\Admin\Promos;

use Livewire\Component;

class CreatePromo extends Component
{
    public function render()
    {
        return view('livewire.admin.promos.create-promo')
            ->extends('layouts.app')
            ->section('contents');
    }
}
