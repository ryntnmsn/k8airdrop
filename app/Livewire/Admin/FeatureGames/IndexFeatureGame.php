<?php

namespace App\Livewire\Admin\FeatureGames;

use App\Models\FeatureGame;
use Livewire\Component;

class IndexFeatureGame extends Component
{
    public $featuredGameID;

    public function deleteFeaturedGame($id) {
        $this->featuredGameID = $id;
    }

    public function destroyFeaturedGame(){
        $featuredGame = FeatureGame::findOrFail($this->featuredGameID);
        $featuredGame->delete();
        $this->dispatch('refresh-page');
    }

    public function render()
    {

        $featuredGames = FeatureGame::all();

        return view('livewire.admin.feature-games.index-feature-game', [
            'featuredGames' => $featuredGames
        ])->extends('layouts.admin.app')->section('contents');
    }
}
