<?php

namespace App\Livewire\Admin\ArticleSubCategory;

use App\Models\ArticleSubCategory;
use App\Models\ArticleCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class IndexArticleSubCategory extends Component
{
    public $title = '';
    public $subCategoryID;
    public $categoryID;

    public ArticleSubCategory $articleSubCategory;

    protected $rules = [
        'title' => 'required',
    ];


    public function storeArticleSubCategory(){
        $this->validate();
        ArticleSubCategory::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'article_category_id' => $this->categoryID
        ]);
        $this->js('window.location.reload()');
    }

    public function editArticleSubCategory(ArticleSubCategory $articlesubCategory) {
        $this->subCategoryID = $articlesubCategory->id;
        $this->title = $articlesubCategory->title;
        $this->categoryID = $articlesubCategory->article_category_id;
    }

    public function updateArticleSubCategory() {
        $this->validate();
        $articlesubCategory = ArticleSubCategory::findOrFail($this->subCategoryID);

        $articlesubCategory->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'article_category_id' => $this->categoryID
        ]);

        $this->js('window.location.reload()');
    }

    public function deleteArticleCategory($id) {
        $this->subCategoryID = $id;
    }

    public function destroyArticleCategory() {
        $articlesubCategory = ArticleSubCategory::findOrFail($this->subcategoryID);
        $articlesubCategory->delete();
        $this->resetFields();
    }

    public function mount() {
        
    }

    public function render()
    {
        $articlesubCategories = ArticleSubCategory::all();
        $articleCategories = ArticleCategory::all();

        return view('livewire.admin.article-sub-category.index-article-sub-category', [
            'articlesubCategories' => $articlesubCategories,
            'articleCategories' => $articleCategories
        ])->extends('layouts.admin.app')->section('contents');
    }
}
