<?php

namespace App\Livewire\Admin\Articlecategory;

use App\Models\ArticleCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class IndexArticleCategory extends Component
{
    public $title = '';
    public $categoryID; 

    public ArticleCategory $articleCategory;

    protected $rules = [
        'title' => 'required'
    ];

    public function resetFields() {
        $this->title = '';
    }

    public function storeArticleCategory(){
        $this->validate();
        ArticleCategory::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title)
        ]);

        $this->resetFields();
    }

    public function editArticleCategory(ArticleCategory $articleCategory) {
        $this->categoryID = $articleCategory->id;
        $this->title = $articleCategory->title;
    }

    public function updateArticleCategory() {
        $this->validate();
        $articleCategory = ArticleCategory::findOrFail($this->categoryID);
        $articleCategory->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title)
        ]);
    }

    public function deleteArticleCategory($id) {
        $this->categoryID = $id;
    }

    public function destroyArticleCategory() {
        $articleCategory = ArticleCategory::findOrFail($this->categoryID);
        $articleCategory->delete();
    }

    public function mount() {
        
    }

    public function render()
    {
        $articleCategories = ArticleCategory::all();

        return view('livewire.admin.articlecategory.index-article-category', compact('articleCategories'))
        ->extends('layouts.app')->section('contents');;
    }
}
