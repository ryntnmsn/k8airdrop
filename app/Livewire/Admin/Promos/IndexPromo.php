<?php

namespace App\Livewire\Admin\Promos;

use App\Models\Promo;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPromo extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search;
    public $pagination = 20;
    public $sortLanguage;

    public function render()
    {
        // if($this->sortLanguage) {
        //     if($this->sortLanguage == '') {
        //         $promos = Promo::with('platforms', 'language')->orderBy('created_at', 'desc');
        //     } elseif($this->sortLanguage == 'en') {
        //         $promos = Promo::with('platforms', 'language')->where('language_id', '1');
        //     } else {
        //         $promos = Promo::with('platforms', 'language')->where('language_id', '2');
        //     }
        // } 
        if($this->search) {
            $promos = Promo::with('platforms', 'language')->orderBy('created_at', 'desc')->where('name', 'LIKE', '%' . $this->search . '%');
        } else {
            $promos = Promo::with('platforms', 'language')->orderBy('created_at', 'desc');
        }

        
      
        return view('livewire.admin.promos.index-promo', [
            'promos' => $promos->paginate($this->pagination)
        ])->extends('layouts.app')->section('contents');
    }
}
