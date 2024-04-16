<?php

namespace App\Livewire\Home;

use Livewire\Component;

class IndexMedia extends Component
{
    public function render()
    {
        return view('livewire.home.index-media')
            ->extends('layouts.home.app')->section('contents');
    }
}
