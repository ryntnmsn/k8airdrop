<?php

namespace App\Livewire\Home\News;

use App\Models\Article;
use App\Models\ArticleCategory;
use Livewire\Component;
use Livewire\WithPagination;

class IndexNews extends Component
{
    use WithPagination;

    public $amount = 12;

    public function loadMore() {
        $this->amount += 12;
    }


    public function render()
    {

        $lang = app()->getLocale();

        $news = Article::with('categories')->where('is_visible', '1')->orderBy('created_at', 'desc')
                ->whereHas('language', function ($query) use ($lang) {
                    $query->where('code', $lang);
                });
        
        $newsSlider = $news->limit(5)->get();
      
        // $newsLatest = $news->limit(6)->get();
        
        $newsAll = Article::with('categories')->where('is_visible', '1')
            ->whereHas('language', function ($query) use ($lang) {
                $query->where('code', $lang);
            })->orderBy('created_at', 'desc')->take($this->amount)->get();


        $newsCategories = ArticleCategory::all();

        return view('livewire.home.news.index-news', [
            'newsCategories' => $newsCategories,
            // 'newsLatest' => $newsLatest,
            'newsSlider' => $newsSlider,
            'newsAll' => $newsAll,
        ])->extends('layouts.home.app')->section('contents');
    }
}