<?php

namespace App\Livewire\Admin\FeatureGames;

use App\Models\FeatureGame;
use App\Models\Language;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditFeatureGame extends Component
{
    use WithFileUploads;
    public $title, $featuredGameID, $old_image, $new_image, $language_id, $is_visible, $url;

    protected $rules = [
        'title' => 'required',
        // 'new_image' => 'image|mimes:jpg,png,jpeg|max:512|dimensions:min_width=640,min_height=640,max_width=640,max_height=640',
        'language_id' => 'required',
    ];

    public function mount(FeatureGame $featuredGames) {
        $featuredGame = FeatureGame::findOrFail($featuredGames->id);
        $this->featuredGameID = $featuredGame->id;
        $this->title = $featuredGame->title;
        $this->url = $featuredGame->url;
        $this->language_id = $featuredGame->language_id;
        $this->old_image = $featuredGame->image;
        if($featuredGame->is_visible == 1) {
            $this->is_visible = true;
        }
    }

    public function updateFeaturedGame() {
        $this->validate();
        $featuredGame = FeatureGame::findOrFail($this->featuredGameID);

        $is_visible = '';
        if($this->is_visible == null) {
            $is_visible = '0';
        } else {
            $is_visible = '1';
        }

        $fileName = '';
        if($this->new_image != null) {
            $fileName = $this->new_image->store('/', 'featured_games');
        } else {
            $fileName = $this->old_image;
        }

        $featuredGame->update([
            'title' => $this->title,
            'url' => $this->url,
            'image' => $fileName,
            'language_id' => $this->language_id,
            'is_visible' => $is_visible
        ]);

        $this->dispatch('updated');
    }

    public function render()
    {
        $languages = Language::all();
        return view('livewire.admin.feature-games.edit-feature-game', [
            'languages' => $languages
        ])->extends('layouts.admin.app')->section('contents');
    }
}
 