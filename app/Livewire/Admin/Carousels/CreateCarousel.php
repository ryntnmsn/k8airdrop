<?php

namespace App\Livewire\Admin\Carousels;

use App\Models\Carousel;
use App\Models\Language;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateCarousel extends Component
{
    use WithFileUploads;

    public $title, $start_date, $end_date, $url, $is_visible, $image, $language_id;

    protected $rules = [
        'title' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'url' => 'required',
        'image' => 'required',
        'language_id' => 'required'
    ];

    public function storeCarousel() {
        $this->validate();

        $is_visible = null;
        if($this->is_visible == null) {
            $is_visible = false;
        } else {
            $is_visible = true;
        }

        Carousel::create([
            'title' => $this->title,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'url' => $this->url,
            'image' => $this->image->store('/', 'carousel'),
            'is_visible' => $is_visible,
            'language_id' => $this->language_id
        ]);
        $this->dispatch('created');
    }


    public function render()
    {
        $languages = Language::all();
        return view('livewire.admin.carousels.create-carousel', [
            'languages' => $languages
        ])->extends('layouts.admin.app')->section('contents');
    }
}
