<?php

namespace App\Livewire\Admin\Promos;

use App\Models\Promo;
use Livewire\Component;

class ViewPromo extends Component
{
    public $promo, $questions, $name, $promo_id, $is_visible, $is_featured, $slug, $language_id,  $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $image;
    public $platforms = [];
    
    public function mount($id) {
        $getPromo = Promo::with('platforms', 'language', 'questions')->find($id);
        $this->promo = $getPromo;
        $this->name = $getPromo->name;
        $this->slug = env('APP_URL') . '/promos/' . $getPromo->slug;
        $this->image = $getPromo->image;
        $this->language_id = $getPromo->language;
        $this->start_date = $getPromo->start_date;
        $this->end_date = $getPromo->end_date;
        $this->is_visible = $getPromo->is_visible;
        $this->is_featured = $getPromo->is_featured;
        $this->is_banner = $getPromo->is_banner;
        $this->prize_pool = $getPromo->prize_pool;
        $this->type = $getPromo->type;
        $this->game_type = $getPromo->game_type;
        $this->button_name = $getPromo->button_name;
        $this->button_link = $getPromo->button_link;
        $this->description = $getPromo->description;
        $this->terms = $getPromo->terms;
        $this->article = $getPromo->article;
        $this->platforms = $getPromo->platforms->pluck('name');
        $this->questions = $getPromo->questions;
    }

    public function render()
    {
        return view('livewire.admin.promos.view-promo')
        ->extends('layouts.app')->section('contents');
    }
}
