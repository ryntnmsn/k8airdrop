<?php

namespace App\Livewire\Home;

use App\Models\Carousel;
use App\Models\FeatureGame;
use App\Models\Promo;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;


class IndexHome extends Component
{
    use WithPagination;

    public $paginationTheme = 'tailwind';

    public $name, $slug, $language_id, $is_visible, $is_featured, $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $image;
    public $platforms = [];
    public $searchPromo;
    public $filterPromoType;
    public $filterIsVisible;
    public $pagination = 6;
    public $promoBanners;
    public $promoCarousels;
    public $promoUpcoming;
    public $featuredGames;
    public $amount = 6;

    public function viewPromo($id) {
        $promo = Promo::with('platforms')->findOrFail($id);
        $this->platforms = $promo->platforms()->pluck('name');
        $this->name = $promo->name;
        $this->prize_pool = $promo->prize_pool;
        $this->game_type = $promo->game_type;
        $this->type = $promo->type;
        $this->image = $promo->image;
        $this->type = $promo->type;
        $this->description = $promo->description;
        $this->start_date = $promo->start_date;
        $this->end_date = $promo->end_date;
        $this->button_name = $promo->button_name;
        $this->button_link = $promo->button_link;
    }


    public function mount() {
        $lang = app()->getLocale();

        $this->promoBanners = Promo::with('platforms')
            ->where('is_visible', '1')
            ->where('is_banner', '1')
            ->where('end_date', '>=', Carbon::now()->format('Y-m-d'))
            ->whereHas('language', function ($query) use ($lang) {
                $query->where('code', $lang);
            })->get();

        // $this->promoCarousels = Carousel::where('is_visible', '1')
        //     ->where('start_date', '<', Carbon::now()->format('Y-m-d'))
        //     ->whereHas('language', function ($query) use ($lang){
        //         $query->where('code', $lang);
        //     })->get();

        $this->promoCarousels = Carousel::where('is_visible', '1')
            ->where('end_date', '>=', Carbon::now()->format('Y-m-d'))
            ->whereHas('language', function ($query) use ($lang){
                $query->where('code', $lang);
            })->get();

        $this->promoUpcoming = Promo::where('start_date', '>', Carbon::now()->format('Y-m-d'))
            ->where('is_visible', '1')
            ->whereHas('language', function ($query) use ($lang) {
                $query->where('code', $lang);
            })->get();

        $this->featuredGames = FeatureGame::where('is_visible', '1')
            ->whereHas('language', function ($query) use ($lang) {
                $query->where('code', $lang);
            })->get();
    }

    public function loadMore() {
        $this->amount += 6;
    }


    public function placeholder() {
        return view('placeholder')->render();
    }


    public function render()
    {
        // sleep(5);
        $lang = app()->getLocale();
        $promos = Promo::with('platforms')
                ->where('is_visible', '1')
                ->where('start_date', '<=', Carbon::now()->format('Y-m-d'))
                ->whereHas('language', function ($query) use ($lang) {
                    $query->where('code', $lang);
                    // $query->orderBy('created_at', 'desc');
            })
            ->when($this->searchPromo, function($query) {
                return $query->where('name', 'LIKE', '%' . $this->searchPromo . '%');
            })
            ->when($this->filterPromoType, function($query) {
                return $query->where('type', $this->filterPromoType);
            })
            ->when($this->filterIsVisible, function($query) {
                return $query->where('end_date', $this->filterIsVisible, Carbon::now()->format('Y-m-d'));
            })
            ->orderBy('end_date', 'desc');

        return view('livewire.home.index-home', [
            'promos' => $promos->take($this->amount)->get(),
        ])->extends('layouts.home.app')->section('contents');
    }
}
