<?php

namespace App\Livewire\Admin\Carousels;

use App\Models\Carousel;
use App\Models\Language;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditCarousel extends Component
{

    use WithFileUploads;

    public $title, $carouselID, $start_date, $end_date, $new_image, $old_image, $language_id, $is_visible, $url;

    protected $rules = [
        'title' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'url' => 'required',
    ];

    public function mount(Carousel $carousel) {
        $carousel = Carousel::findOrFail($carousel->id);
        $this->carouselID = $carousel->id;
        $this->title = $carousel->title;
        $this->start_date = $carousel->start_date;
        $this->end_date = $carousel->end_date;
        $this->old_image = $carousel->image;
        $this->language_id = $carousel->language_id;
        $this->url = $carousel->url;
        if($carousel->is_visible == 1) {
            $this->is_visible = true;
        }
    }

    public function updateCarousel() {
        $carousel = Carousel::findOrFail($this->carouselID);
        $fileName = '';

        $is_visible = '';
        if($this->is_visible == null) {
            $is_visible = '0';
        } else {
            $is_visible = '1';
        }

        if($this->new_image != null) {
            $fileName = $this->new_image->store('/', 'carousel');
        } else {
            $fileName = $this->old_image;
        }

        $carousel->update([
            'title' => $this->title,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'url' => $this->url,
            'image' => $fileName,
            'is_visible' => $is_visible,
            'language_id' => $this->language_id
        ]);

        $this->dispatch('updated');
    }

    public function render()
    {
        $languages = Language::all();
        return view('livewire.admin.carousels.edit-carousel', [
            'languages' => $languages
        ])->extends('layouts.admin.app')->section('contents');
   
    }
}
