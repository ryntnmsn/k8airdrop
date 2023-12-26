<?php

namespace App\Livewire\Admin\Platforms;

use App\Models\Platform;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public $pagination = 10;

    public function render()
    {
        if(!$this->search) {
            $platforms = Platform::orderBy('created_at', 'desc')->paginate($this->pagination);
        } else {
            $platforms = Platform::where('name', 'like' , '%' . $this->search . '%')->paginate($this->pagination);
        }

        return view('livewire.admin.platforms.index', compact('platforms'))
            ->extends('layouts.app')
            ->section('contents');
    }

}
