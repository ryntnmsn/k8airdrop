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
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

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


    public function render()
    {
        $promos = Promo::with('platforms', 'language')
            ->when($this->active, function($query) {
                return $query->where('is_visible', 1);
            })
            ->when($this->search, function($query) {
                return $query->where('name', 'LIKE', '%' . $this->search . '%'); 
            })
            ->when($this->lang, function($query) {
                return $query->where('language_id', $this->lang);
            })
            ->orderBy($this->sortField, $this->sortDirection);


        $query = $promos->toSql();


        return view('livewire.admin.promos.index-promo', [
            'promos' => $promos->paginate($this->pagination),
            'query' => $query
        ])->extends('layouts.app')->section('contents');
    }
}
