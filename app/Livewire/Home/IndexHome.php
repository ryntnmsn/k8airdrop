<?php

namespace App\Livewire\Home;

use App\Models\Promo;
use Livewire\Component;

class IndexHome extends Component
{
    public function render()
    {
        $promosBanner = Promo::where('is_visible', '1')->where('is_banner', '1');

        return view('livewire.home.index-home', [
            'promos' => $promosBanner->get()
        ])->extends('layouts.home.app')->section('contents');
    }
}
