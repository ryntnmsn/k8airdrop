<?php

namespace App\Livewire\Admin\Articletag;

use App\Models\ArticleTag;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class IndexArticleTag extends Component
{
    use WithPagination;

    public $title = '';
    public $tagID;
    public $pagination = 20;

    protected $paginationTheme = 'tailwind';

    // protected $listeners = [
    //     'deleteConfirmed' => '$refresh'
    // ];


    public ArticleTag $articleTag;

    protected $rules = [
        'title' => 'required'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function storeArticleTag() {
        $this->validate();
        ArticleTag::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title)
        ]);
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


    public function deleteArticleTag(int $id) {
        $this->tagID = $id;
    }

    public function destroyArticleTag() {
        $articleTag = ArticleTag::findOrFail($this->tagID);
        $articleTag->delete();
        $this->js('window.location.reload()'); 
    }

    public function render()
    {
        return view('livewire.admin.articletag.index-article-tag', [
            'articleTags' => ArticleTag::paginate($this->pagination)
        ])->extends('layouts.admin.app')->section('contents');
    }
}
