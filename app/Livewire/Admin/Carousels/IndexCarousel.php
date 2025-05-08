<?php

namespace App\Livewire\Admin\Carousels;

use App\Models\Carousel;
use Livewire\Component;

class IndexCarousel extends Component
{

    public $carouselID;

    public function deleteCarousel($id) {
        $this->carouselID = $id;
    }

    public function destroyCarousel() {
        $carousel = Carousel::findOrFail($this->carouselID);
        $carousel->delete();
        $this->dispatch('refresh-page');
    }

    public function render()
    {
        $carousels = Carousel::all();
        return view('livewire.admin.carousels.index-carousel',[
            'carousels' => $carousels
        ])->extends('layouts.admin.app')->section('contents');;
    }
}
