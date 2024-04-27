<?php

namespace App\Livewire\Admin\FeatureGames;

use App\Models\FeatureGame;
use App\Models\Language;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateFeatureGame extends Component
{
    use WithFileUploads;

    public $title, $image, $is_visible, $language_id, $url;

    protected $rules = [
        'title' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg|max:512',
        'language_id' => 'required',
    ];

    public function storeFeaturedGame() {
        $this->validate();

        $status = false;
        if($this->is_visible == null) {
            $this->is_visible == false;
        } else {
            $this->is_visible == true;
        }

        FeatureGame::create([
            'title' => $this->title,
            'url' => $this->url,
            'image' => $this->image->store('/', 'featured_games'),
            'language_id' => $this->language_id,
            'is_visible' => $status
        ]);

        $this->dispatch('created');
    }

    public function render()
    {
        $laguages = Language::all();
        return view('livewire.admin.feature-games.create-feature-game', [
            'languages' => $laguages
        ])->extends('layouts.admin.app')->section('contents');;
    }
}
