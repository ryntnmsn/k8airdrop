<?php

namespace App\Livewire\Home\News;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleSubCategory;
use Livewire\Component;
use Livewire\WithPagination;

class IndexNewsCategory extends Component
{
    use WithPagination;

    public $title;
    public $pagination = 12;
    public $news;
    public $slug;


    public function mount($slug) {
        $categorySlug = ArticleCategory::where('slug', $slug)->first();
        $this->slug = $categorySlug->slug;
        $this->title = $categorySlug->title;
    }

    public function render()
    {
        $lang = app()->getLocale();
        $slug =  $this->slug;

        $newsAll = Article::with('categories')->where('is_visible', '1')
            ->whereHas('categories', function ($slugQuery) use ($slug) {
                $slugQuery->where('slug', $slug);
            })
            ->whereHas('language', function ($langQuery) use ($lang) {
                $langQuery->where('code', $lang);
            })->simplePaginate($this->pagination);
        
        $subCategories = ArticleSubCategory::all();

        return view('livewire.home.news.index-news-category', [
            'newsAll' => $newsAll,
            'subCategories' => $subCategories
        ])->extends('layouts.home.app')->section('contents');
    }
}
