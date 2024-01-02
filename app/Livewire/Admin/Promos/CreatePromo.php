<?php

namespace App\Livewire\Admin\Promos;

use App\Models\Platform;
use Livewire\Component;
use Illuminate\Support\Str;

class CreatePromo extends Component
{

    public $name;
    public $slug;

    public function generateSlug() {
        $this->slug = 'URL Preview: ' . config('app.url') . '/promos/' . Str::slug($this->name);
    }

    public function getPlatforms() {
        return Platform::all();
    }

    public function render()
    {
        return view('livewire.admin.promos.create-promo',[
            'platforms' => $this->getPlatforms()
        ])->extends('layouts.app')->section('contents');
    }
}
