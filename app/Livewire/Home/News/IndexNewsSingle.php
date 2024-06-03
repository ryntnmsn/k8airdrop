<?php

namespace App\Livewire\Home\News;

use App\Models\Article;
use Livewire\Component;

class IndexNewsSingle extends Component
{
    public $news, $title, $image, $description, $categories, $created_at, $recommendedNews, $tags;

    public function mount($slug) {
        $lang = app()->getLocale();
        $news = Article::with('categories', 'tags')->where('slug', $slug)->first();
        $recommendedNews = Article::with('categories')->where('is_visible', 1)->inRandomOrder()->limit(3)
            ->whereHas('language', function ($query) use ($lang) {
                $query->where('code', $lang);
            })->get();
        $this->title = $news->title;
        $this->image = $news->image;
        $this->description = $news->description;
        $this->categories = $news->categories()->get();
        $this->tags = $news->tags()->get();
        $this->created_at = $news->created_at;
        $this->recommendedNews = $recommendedNews;

        views($news)->record();

    }

    public function render()
    {
        return view('livewire.home.news.index-news-single')
            ->extends('layouts.home.app')->section('contents');
    }
}
