<?php

namespace App\Livewire\Home;

use App\Models\Platform;
use App\Models\Promo;
use Carbon\Carbon;
use Livewire\Component;

class SinglePromo extends Component
{

    public $promo_id, $days_left, $name, $slug, $language_id, $is_visible, $is_featured, $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $image;
    public $platforms;


    public function next_record() {
        $lang = app()->getLocale();
        $next_record = Promo::where('id', '>' , $this->promo_id)
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
            })->first();
        dd($next_record);
        $this->redirectRoute('single.promo', ['slug' => $next_record->slug]);
    }

    public function mount($slug) {
        $promo = Promo::with('platforms')->where('slug', $slug)->first();
        $this->platforms = $promo->platforms()->get();

        $parseStartDate = Carbon::parse($promo->start_date);
        $parseEndDate = Carbon::parse($promo->end_date);
        $this->days_left = Carbon::parse(Carbon::now())->diffInDays($parseEndDate ,false) + 1;

        // dd($this->platforms);
        $this->promo_id = $promo->id;
        $this->name = $promo->name;
        $this->image = $promo->image;
        $this->start_date = $promo->start_date;
        $this->end_date = $promo->end_date;
        $this->prize_pool = $promo->prize_pool;
        $this->type = $promo->type;
        $this->game_type = $promo->game_type;
        $this->description = $promo->description;
        $this->terms = $promo->terms;
        $this->article = $promo->article;
        $this->button_name = $promo->button_name;
        $this->button_link = $promo->button_link;
    }

    public function render()
    {
        $lang = app()->getLocale();

        $getPromos = Promo::where('is_visible', '1')->orderBy('created_at', 'desc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
            })->limit(6);

        $getPlatforms = Platform::where('is_visible', '1');

        return view('livewire.home.single-promo', [
            'getPromos' => $getPromos->get(),
            'getPlatforms' => $getPlatforms->get(),
        ])->extends('layouts.home.app')->section('contents');
    }
}
