<?php

namespace App\Livewire\Home;

use App\Models\Carousel;
use App\Models\Promo;
use Livewire\Component;

class IndexHome extends Component
{
    public function render()
    {
        $promosBanner = Promo::with('platforms')->where('is_visible', '1')->where('is_banner', '1');

        $promosCarousel = Carousel::where('is_visible', '1');

        return view('livewire.home.index-home', [
            'promos' => $promosBanner->get(),
            'carousels' => $promosCarousel->get()
        ])->extends('layouts.home.app')->section('contents');
    }
}
