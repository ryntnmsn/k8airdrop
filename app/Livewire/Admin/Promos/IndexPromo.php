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
            $promos = Promo::with('platforms', 'language')->orderBy('created_at', 'desc');
        } else {
            $promos = Promo::with('platforms', 'language')->orderBy('created_at', 'desc')->where('name', 'LIKE', '%' . $this->search . '%');
        }

        return view('livewire.admin.promos.index-promo', [
            'promos' => $promos->paginate($this->pagination)
        ])->extends('layouts.app')->section('contents');
    }
}
