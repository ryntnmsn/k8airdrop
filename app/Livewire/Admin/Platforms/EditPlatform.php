<?php

namespace App\Livewire\Admin\Platforms;

use App\Models\Platform;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EditPlatform extends Component
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

        // $status = (isset($this->is_visible) == '1' ? '1' : '0');

        $this->platform->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'hex_color' => $this->hex_color,
            'is_visible' => $this->is_visible
        ]);

        $this->dispatch('updated', [
            'title' => 'Updated',
            'text' => 'Platform updated successfully.',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);

    }

    public function render()
    {
        return view('livewire.admin.platforms.edit-platform')
        ->extends('layouts.admin.app')->section('contents');
    }
}
