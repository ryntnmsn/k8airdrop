<?php

namespace App\Livewire\Home;

use Livewire\Component;

class IndexHome extends Component
{
    public function render()
    {
        return view('livewire.home.index-home')
            ->extends('layouts.home.app')->section('contents');
    }
}
