<?php

namespace App\Livewire\Home;

use App\Models\Article;
use App\Models\Promo;
use Livewire\Component;

class IndexSearch extends Component
{

    public $globalSearch;


    public function resetSearch(){
        $this->globalSearch = '';
    }

    public function render()
    {
        $lang = app()->getLocale();

        $promoResults = [];

        $promoResults = Promo::where('name', 'LIKE', '%' . $this->globalSearch . '%')
            ->whereHas('language', function($query) use($lang) {
                $query->where('code', $lang);
            });
        
        $newsResults = Article::where('title', 'LIKE', '%' . $this->globalSearch . '%')
            ->whereHas('language', function($query) use($lang) {
                $query->where('code', $lang);
            });
        return view('livewire.home.index-search', [
            'promoResults' => $promoResults->limit(5)->get(),
            'newsResults' => $newsResults->limit(5)->get(),
        ]);
    }
}
