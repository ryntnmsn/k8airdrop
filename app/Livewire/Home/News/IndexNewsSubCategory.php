<?php

namespace App\Livewire\Home\News;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleSubCategory;
use Livewire\Component;
use Livewire\WithPagination;

class IndexNewsSubCategory extends Component
{
    use WithPagination;

    public $title;
    public $pagination = 12;
    public $news;
    public $slug;
    public $subCatID;

    public function mount($slug) {
        $subCat = ArticleSubCategory::where('slug', $slug)->first();
        $this->subCatID = $subCat->id;
    }

    public function render()
    {

        $lang = app()->getLocale();

        $newsAll = Article::with('subcategory')
            ->where('is_visible', '1')
            ->where('article_sub_category_id', $this->subCatID)
            ->whereHas('language', function ($langQuery) use ($lang) {
                $langQuery->where('code', $lang);
            })->simplePaginate($this->pagination);

        return view('livewire.home.news.index-news-sub-category', [
            'newsAll' => $newsAll,
        ])->extends('layouts.home.app')->section('contents');
    }
}
