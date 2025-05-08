<?php

namespace App\Livewire\Home\Mascot;

use Livewire\Component;

class IndexMascot extends Component
{
    public function render()
    {

        $path = public_path('storage/assets/');

        $images = \File::allFiles($path);

        return view('livewire.home.mascot.index-mascot', [
            'images' => $images,
        ])->extends('layouts.home.app')->section('contents');
    }
}
