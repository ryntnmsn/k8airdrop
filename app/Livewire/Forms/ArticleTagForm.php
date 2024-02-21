<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ArticleTagForm extends Form
{
    #[Rule('required', message: 'Title is required')]
    public $title = '';

    public $tagID;
}
