<?php

namespace App\Livewire\Admin\Article;

use Livewire\Component;

class IndexArticle extends Component
{
    public function render()
    {
        return view('livewire.admin.article.index-article')
            ->extends('layouts.app')->section('contents');
    }
}