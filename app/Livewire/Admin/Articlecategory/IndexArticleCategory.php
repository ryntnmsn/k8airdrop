<?php

namespace App\Livewire\Admin\Articlecategory;

use App\Models\ArticleCategory;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class IndexArticleCategory extends Component
{

    use WithFileUploads;

    public $title = '';
    public $categoryID;
    public $image = '';
    public $newImage;

    public ArticleCategory $articleCategory;

    protected $rules = [
        'title' => 'required',
        // 'image' => 'required|max:512|dimensions:min_width=400,min_height=400,max_width=400,max_height=400',
    ];

    // public function resetFields() {
    //     $this->title = '';
    //     $this->image = '';
    // }

    public function storeArticleCategory(){
        $this->validate();
        ArticleCategory::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'image' => $this->image->store('/', 'article_category'),
        ]);
        $this->js('window.location.reload()');
    }

    public function editArticleCategory(ArticleCategory $articleCategory) {
        $this->categoryID = $articleCategory->id;
        $this->title = $articleCategory->title;
        $this->image = $articleCategory->image;
    }

    public function updateArticleCategory() {
        $this->validate();
        $articleCategory = ArticleCategory::findOrFail($this->categoryID);
        
        $fileName = '';

        if($this->newImage != '') {
            $fileName = $this->newImage->store('/', 'article_category');
        } else {
            $fileName = $this->image;
        }

        $articleCategory->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'image' => $fileName,
        ]);

        $this->js('window.location.reload()');
    }

    public function deleteArticleCategory($id) {
        $this->categoryID = $id;
    }

    public function destroyArticleCategory() {
        $articleCategory = ArticleCategory::findOrFail($this->categoryID);
        $articleCategory->delete();
        $this->resetFields();
    }

    public function mount() {
        
    }

    public function render()
    {
        $articleCategories = ArticleCategory::all();

        return view('livewire.admin.articlecategory.index-article-category', compact('articleCategories'))
        ->extends('layouts.admin.app')->section('contents');;
    }
}
