<?php

namespace App\Livewire\Home;

use Livewire\Component;

class ViewPromo extends Component
{
    public function render()
    {
        return view('livewire.home.view-promo')
        ->extends('layouts.home.app')->section('contents');
    }
}
