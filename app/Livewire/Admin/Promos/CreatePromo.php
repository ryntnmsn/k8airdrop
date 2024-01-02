<?php

namespace App\Livewire\Admin\Promos;

use App\Models\Language;
use App\Models\Platform;
use Livewire\Component;
use Illuminate\Support\Str;

class CreatePromo extends Component
{

    public $name;
    public $slug;
    public $gameType;

    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }

    public function getPlatforms() {
        return Platform::all();
    }

    public function showGameType() {
        return $this->gameType();
    }

    public function getLanguages() {
        return Language::all();
    }

    public function render()
    {
        return view('livewire.admin.promos.create-promo',[
            'platforms' => $this->getPlatforms(),
            'languages' => $this->getLanguages(),
        ])->extends('layouts.app')->section('contents');
    }
}
