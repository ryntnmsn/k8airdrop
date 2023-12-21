<?php

namespace App\Livewire;

use App\Models\Platform;
use Livewire\Component;

class Platforms extends Component
{

    public $search;
    public $pagination = 5;

    public function render()
    {

        if(!$this->search) {
            $platforms = Platform::paginate($this->pagination);
        } else {
            $platforms = Platform::where('name', 'like' , '%' . $this->search . '%')->paginate($this->pagination);
        }

        return view('livewire.platforms', [
            'platforms' => $platforms
        ]);
    }
}
