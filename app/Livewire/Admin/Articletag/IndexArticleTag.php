<?php

namespace App\Livewire\Admin\Articletag;

use App\Models\ArticleTag;
use Livewire\Component;
use Illuminate\Support\Str;

class IndexArticleTag extends Component
{

    public $title = '';
    public $tagID;

    public ArticleTag $articleTag;

    protected $rules = [
        'title' => 'required'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function storeArticleTag() {
        $this->title = 'sample';
        // $this->validate();
        // ArticleTag::create([
        //     'title' => $this->title,
        //     'slug' => Str::slug($this->title)
        // ]);
    }

 
    public function editArticleTag(ArticleTag $articleTag){
        $this->tagID = $articleTag->id;
        $this->title = $articleTag->title;
    }

    public function updateArticleTag() {
        $this->validate();
        $articleTag = ArticleTag::findOrFail($this->tagID);
        $articleTag->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title)
        ]);
    }


    public function render()
    {
        $articleTags = ArticleTag::all();
        return view('livewire.admin.articletag.index-article-tag', compact('articleTags'))
            ->extends('layouts.app')->section('contents');
    }
}
