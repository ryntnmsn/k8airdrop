<?php

namespace App\Livewire\Home;

use App\Models\Promo;
use Livewire\Component;

class SinglePromo extends Component
{

    public $promo_id, $name, $slug, $language_id, $is_visible, $is_featured, $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $image;
    public $platforms = [];

    public function mount($slug) {
        $promo = Promo::where('slug', $slug)->first();
        $this->name = $promo->name;
        $this->image = $promo->image;
    }

    public function render()
    {
        return view('livewire.home.single-promo')
        ->extends('layouts.home.app')->section('contents');
    }
}
