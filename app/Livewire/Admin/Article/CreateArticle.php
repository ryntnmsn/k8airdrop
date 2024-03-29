<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;
use App\Models\Language;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateArticle extends Component
{

    use WithFileUploads;

    public $title, $language_id, $short_description, $description, $is_visible, $image, $demo_url;
    public $article_categories = [];
    public $article_tags = [];
    public $getLanguages;
    public $getCategories;
    public $getTags;

    protected $rules = [
        'title' => 'required',
        'short_description' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg|max:512|dimensions:min_width=1388,min_height=750,max_width=1388,max_height=750',
        'language_id' => 'required'
        // 'article_categories' => 'required',
    ];

    public function imageName() {
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $image = $this->image->store('/', 'article');
        return $image;
    }

    public function storeArticle() {
        $this->validate();
        $is_visible = (isset($this->is_visible) == '0' ? '0' : '1');
        $article = Article::create([
            'title' => $this->title,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'language_id' => $this->language_id,
            'image' => $this->imageName(),
            'demo_url' => $this->demo_url,
            'is_visible' => $is_visible
        ]);

        foreach($this->article_categories as $key => $value) {
            $article->categories()->attach($this->article_categories[$key]);
        }

        foreach($this->article_tags as $key => $value) {
            $article->tags()->attach($this->article_tags[$key]);
        }

        $this->dispatch('created');

    }

    public function mount() {
        $this->getLanguages = Language::all();
        $this->getCategories = ArticleCategory::all();
        $this->getTags = ArticleTag::all();
    }

    public function render()
    {
        return view('livewire.admin.article.create-article')
            ->extends('layouts.admin.app')->section('contents');
    }
}
