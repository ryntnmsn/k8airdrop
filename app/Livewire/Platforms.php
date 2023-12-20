<?php

namespace App\Livewire;

use App\Models\Platform;
use Livewire\Component;

class Platforms extends Component
{
    public function render()
    {
        $platforms = Platform::all();
        return view('livewire.platforms', [
            'platforms' => $platforms
        ]);
    }
}
