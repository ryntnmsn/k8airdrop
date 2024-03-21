<?php

namespace App\Livewire\Home\News;

use App\Models\Article;
use Livewire\Component;

class IndexNewsLatest extends Component
{
    public function render()
    {
        $lang = app()->getLocale();
        $news = Article::with('categories')->where('is_visible', 1)->orderBy('created_at', 'desc')
            ->whereHas('language', function ($query) use ($lang) {
                $query->where('code', $lang);
            })->limit(21)->get();

            return view('livewire.home.news.index-news-latest', [
            'news' => $news
        ])->extends('layouts.home.app')->section('contents');
       
    }
}
