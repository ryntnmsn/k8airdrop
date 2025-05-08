<?php

namespace App\Livewire\Admin\Languages;

use App\Models\Language;
use Livewire\Component;

class CreateLanguage extends Component
{
    public $name;
    public $code;

    protected $rules = [
        'name' => 'required|max:30',
        'code' => 'required|max:30',
    ];

    public function store() {

        $this->validate();

        Language::create([
            'name' => $this->name,
            'code' => $this->code
        ]);

        $this->dispatch('created', [
            'title' => 'Created',
            'text' => 'Language created successfully.',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.languages.create-language')
            ->extends('layouts.admin.app')->section('contents');
    }
}
