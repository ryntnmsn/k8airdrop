<?php

namespace App\Livewire\Home;

use App\Models\Promo;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPromoPage extends Component
{
    use WithPagination;

    public $paginationTheme = 'tailwind';

    public $platforms = [];
    public $searchPromo;
    public $filterPromoType;
    public $filterIsVisible;
    public $amount = 24;


    public function loadMore() {
        $this->amount += 6;
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
 
        return view('livewire.home.index-promo-page', [
            'promos' => $promos->take($this->amount)->get(),
        ])->extends('layouts.home.app')->section('contents');
    }
}
