<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class IndexArticle extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';
    public $active;
    public $lang;
    public $perPage = '25';
    public $sortDirection = 'desc';
    public $sortField = 'created_at';
    public $article_id;

    protected $queryString = [
        'search' => ['except' => ''], 
        'active' => ['except' => false],
        'lang' => ['except' => ''],
        'sortDirection' => ['as' => 'sort'],
    ];
    

    public function sortBy($field) {

        if($this->sortField == $field ) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection == 'asc';
        }

        $this->sortField = $field;
    }

    public function deleteArticle(Article $article) {
        $this->article_id = $article->id;
    }

    public function destroyArticle() {
        $article = Article::findOrFail($this->article_id);
        $article->delete();

        $this->dispatch('deleted');
    }
    

    public function render()
    {
        $articles = Article::with('categories', 'tags')
            ->when($this->search, function ($query) {
                return $query->where('title', 'LIKE', '%' . $this->search . '%');
            })
            ->when($this->active, function ($query) {
                return $query->where('is_visible', '1');
            })
            ->when($this->lang, function ($query) {
                return $query->where('language_id', $this->lang);
            })
            ->orderBy($this->sortField, $this->sortDirection);;

        // $getArticle = Article::with('categories')->orderBy('id', 'desc')->get();

        return view('livewire.admin.article.index-article', [
            'getArticles' => $articles->paginate($this->perPage)
        ])->extends('layouts.admin.app')->section('contents');
    }
}