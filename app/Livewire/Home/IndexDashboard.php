<?php

namespace App\Livewire\Home;

use App\Models\Promo;
use App\Models\User;
use App\Models\UserDetail;
use Livewire\Component;
use Livewire\WithPagination;

class IndexDashboard extends Component
{
    use WithPagination;

    public $promos;
    public $pagination = 5;

    public function mount() {
        $userId = auth()->user()->id;
        $this->promos = Promo::with('user_details')
            ->whereHas('user_details', function ($query) use ($userId) {
                return $query->where('user_id', $userId);
            })->get();

 

    //    dd($this->userDetails);
    }

    public function render()
    {


        return view('livewire.home.index-dashboard',)->extends('layouts.home.app')->section('contents');
    }
}
