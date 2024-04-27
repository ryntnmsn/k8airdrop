<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;
use App\Models\Language;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditArticle extends Component
{
    use WithFileUploads;

    public $article_id, $title, $language_id, $short_description, $description, $is_visible, $new_image, $old_image, $demo_url;
    public $article_categories = [];
    public $article_tags = [];
    public $getLanguages;
    public $getCategories;
    public $getTags;
    
    public Article $article;

    // protected $rules = [
    //     'title' => 'required',
    //     'short_description' => 'required',
    //     'description' => 'required',
    //     'image' => 'required|image|mimes:jpg,png,jpeg|max:512|dimensions:min_width=1388,min_height=750,max_width=1388,max_height=750',
    //     'language_id' => 'required',
    // ];

    public function updateArticle() {
        $article = Article::with('categories', 'tags')->findOrFail($this->article_id);

        $filename = '';
        if($this->new_image != null) {
            $filename = $this->new_image->store('/', 'article');
        } else {
            $filename = $this->old_image;
        }

        $is_visible = '';
        if($this->is_visible == null) {
            $is_visible = '0';
        } else {
            $is_visible = '1';
        }

        $article->update([
            'title' => $this->title,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'language_id' => $this->language_id,
            'demo_url' => $this->demo_url,
            'is_visible' => $is_visible,
            'image' => $filename,
        ]);

        $article->categories()->sync($this->article_categories);

        $article->tags()->sync($this->article_tags);

        $this->dispatch('updated');

    }

    public function mount(Article $article) {
        $article = Article::with('categories', 'tags')->findOrFail($article->id);

        $this->article_id = $article->id;
        $this->title = $article->title;
        $this->description = $article->description;
        $this->language_id = $article->language_id;
        $this->short_description = $article->short_description;
        $this->demo_url = $article->demo_url;
        $this->old_image = $article->image;
        $this->article_categories = $article->categories->pluck('id');
        $this->article_tags = $article->tags->pluck('id');

        if($article->is_visible == '1') {
            $this->is_visible = true;
        }
        
        $this->getCategories = ArticleCategory::all();
        $this->getLanguages = Language::all();
        $this->getTags = ArticleTag::all();

    }

    public function render()
    {

        return view('livewire.admin.article.edit-article')
            ->extends('layouts.admin.app')->section('contents');
    }
}
