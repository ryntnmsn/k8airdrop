<?php

namespace App\Livewire\Admin\Languages;

use App\Models\Language;
use Livewire\Component;

class EditLanguage extends Component
{

    public $language;
    public $name;
    public $code;
    
    public function rules() {
        return [
            'name' => ['required', 'max:30'],
            'code' => ['required', 'max:30'],
        ];
    }

    public function mount(Language $language) {
        $this->language = $language;
        $this->name = $language->name;
        $this->code = $language->code;
    }

    public function updateLanguage() {
        $this->validate();

        $this->language->update($this->validate());

        $this->dispatch('updated', [
            'title' => 'Updated',
            'text' => 'Language updated successfully.',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);

    }

    public function render()
    {
        return view('livewire.admin.languages.edit-language')
            ->extends('layouts.admin.app')->section('contents');
    }
}
