<?php

namespace App\Livewire\Admin\Platforms;

use App\Models\Platform;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    
    public $platform;
    public $name;
    public $slug;
    public $hex_color;
    public $is_visible;

    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }

    public function rules() {
        return [
            'name' => ['required', 'max:32'],
            // 'slug' => ['required', Rule::unique('platforms')->ignore($this->slug)],
            'hex_color' => ['required'],
        ];
    }

    public function mount(Platform $platform) {

        $this->platform = $platform;
        $this->name = $platform->name;
        $this->slug = $platform->slug;
        $this->hex_color = $platform->hex_color;
        $this->is_visible = $platform->is_visible;

    }
    
    public function updatePlatformn() {
        $this->validate();
        
        // $status = (isset($this->is_visible) == '0' ? '0' : '1');

        $this->platform->update($this->validate());

        $this->dispatch('updated', [
            'title' => 'Success',
            'text' => 'Platform updated successfully.',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);

    }

    public function render()
    {
        return view('livewire.admin.platforms.edit')
        ->extends('layouts.app')
        ->section('contents');
    }
}
