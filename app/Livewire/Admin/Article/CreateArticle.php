<?php

namespace App\Livewire\Admin\Article;

use Livewire\Component;

class CreateArticle extends Component
{
    public function render()
    {
        return view('livewire.admin.article.create-article')
            ->extends('layouts.app')->section('contents');
    }
}
