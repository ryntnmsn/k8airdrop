<?php

namespace App\Livewire\Home;

use Livewire\Component;

class TestGiveaways extends Component
{
    public function render()
    {
        return view('livewire.home.test-giveaways',)->extends('layouts.home.app')->section('contents');
    }
}
