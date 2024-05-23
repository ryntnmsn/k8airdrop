<?php

namespace App\Livewire\Home\News;

use App\Models\Article;
use App\Models\ArticleCategory;
use Livewire\Component;
use Livewire\WithPagination;

class IndexNews extends Component
{
    use WithPagination;

    public $paginate = 12;

    public function render()
    {

        $lang = app()->getLocale();

        $news = Article::with('categories')->where('is_visible', '1')->orderBy('created_at', 'desc')
                ->whereHas('language', function ($query) use ($lang) {
                    $query->where('code', $lang);
                });
        
        $newsSlider = $news->limit(5)->get();
      
        $newsLatest = $news->limit(3)->get();
        
        $newsAll = Article::with('categories')->where('is_visible', '1')
            ->whereHas('language', function ($query) use ($lang) {
                $query->where('code', $lang);
            })->inRandomOrder()->simplePaginate($this->paginate);


        $newsCategories = ArticleCategory::all();

        return view('livewire.home.news.index-news', [
            'newsCategories' => $newsCategories,
            'newsLatest' => $newsLatest,
            'newsSlider' => $newsSlider,
            'newsAll' => $newsAll,
        ])->extends('layouts.home.app')->section('contents');
    }
}