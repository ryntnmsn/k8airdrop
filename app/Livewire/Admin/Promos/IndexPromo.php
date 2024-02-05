<?php

namespace App\Livewire\Admin\Promos;

use App\Models\Promo;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPromo extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';
    public $pagination = 20;
    public $active;
    public $lang;

    protected $queryString = [
        'search' => ['except' => ''], 
        'active' => ['except' => false],
        'lang' => ['except' => '']
    ];

    public function render()
    {
        // if($this->search) {
        //     $promos = Promo::with('platforms', 'language')->orderBy('created_at', 'desc')->where('name', 'LIKE', '%' . $this->search . '%');
        // } else {
        //     $promos = Promo::with('platforms', 'language')->orderBy('created_at', 'desc');
        // }

        $promos = Promo::with('platforms', 'language')->orderBy('created_at', 'desc')
            ->when($this->active, function($query) {
                return $query->where('is_visible', 1); })
            ->when($this->search, function($query) {
                return $query->where('name', 'LIKE', '%' . $this->search . '%'); })
            ->when($this->lang, function($query) {
                return $query->where('language_id', $this->lang);
            });

        return view('livewire.admin.promos.index-promo', [
            'promos' => $promos->paginate($this->pagination)
        ])->extends('layouts.app')->section('contents');
    }
}
