<?php

namespace App\Livewire\Admin\Platforms;

use App\Models\Platform;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $name;
    public $slug;
    public $hex_color;
    public $is_visible;

    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }

    protected $rules = [
        'name' => 'required|max:32',
        'slug' => 'required|unique:platforms,slug',
        'hex_color' => 'required',
    ];

    public function store() {

        $this->validate();
        
        $status = (isset($this->is_visible) == '0' ? '0' : '1');

        Platform::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'is_visible' => $status,
            'hex_color' => $this->hex_color
        ]);

        $this->dispatch('created', [
            'title' => 'Success',
            'text' => 'Platform created successfully.',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.platforms.create')
            ->extends('layouts.app')
            ->section('contents');
    }

}
