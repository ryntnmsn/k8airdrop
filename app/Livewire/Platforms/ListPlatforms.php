<?php

namespace App\Livewire\Platforms;

use App\Models\Platform;
use Livewire\Component;

class ListPlatforms extends Component
{
    public function render()
    {
        $platforms = Platform::all();
        return view('livewire.platforms.list-platforms', [
            'platforms' => $platforms
        ]);
    }
}
