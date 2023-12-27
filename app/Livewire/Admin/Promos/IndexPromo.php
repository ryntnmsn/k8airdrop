<?php

namespace App\Livewire\Admin\Promos;

use App\Models\Promo;
use Livewire\Component;

class IndexPromo extends Component
{

    public $search;
    public $pagination = 20;

    public function render()
    {

        if(!$this->search) {
            $promos = Promo::orderBy('created_at', 'desc')->paginate($this->pagination);
        } else {
            $promos = Promo::orderBy('created_at', 'desc')->where('name', 'LIKE', '%' . $this->search . '%')->paginate($this->pagination);
        }

        return view('livewire.admin.promos.index-promo', compact('promos'))
            ->extends('layouts.app')
            ->section('contents');
    }
}
