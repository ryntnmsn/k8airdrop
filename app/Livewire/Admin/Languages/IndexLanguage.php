<?php

namespace App\Livewire\Admin\Languages;

use App\Models\Language;
use Livewire\Component;

class IndexLanguage extends Component
{
    public $search;
    public $pagination = 10;

    public function render()
    {
        if(!$this->search) {
            $languages = Language::paginate($this->pagination);
        } else {
            $languages = Language::where('name', 'LIKE', '%' . $this->search . '%')->paginate($this->pagination);
        }

        return view('livewire.admin.languages.index-language', compact('languages'))
            ->extends('layouts.admin.app')->section('contents');
    }
}
