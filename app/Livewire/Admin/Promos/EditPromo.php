<?php

namespace App\Livewire\Admin\Promos;

use App\Models\Language;
use App\Models\Platform;
use App\Models\Promo;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditPromo extends Component
{
    use WithFileUploads;

    public $promo, $name, $is_visible, $is_featured, $updatedImage, $slug, $language_id,  $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $image;
    public $platforms = [];

    public $platformTest;


    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }

    public function getPlatforms() {
        return Platform::all();
    }

    public function getLanguage() {
        return Language::all();
    }

    public function imageName() {
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $image = $this->image->storeAs('image_uploads', $imageName);
        return $image;
    }

    public function mount($id) {
        $getPromo = Promo::with('platforms', 'language')->find($id);

        $this->platforms = $getPromo->platforms->pluck('id');
 
        if($getPromo->is_visible == '1') {
            $this->is_visible = true;
        }

        if($getPromo->is_featured == '1') {
            $this->is_featured = true;
        }

        if($getPromo->is_banner == '1') {
            $this->is_banner = true;
        }
        
        $this->promo = $getPromo;
        $this->name = $getPromo->name;
        $this->prize_pool = $getPromo->prize_pool;
        $this->start_date = $getPromo->start_date;
        $this->end_date = $getPromo->end_date;
        $this->button_name = $getPromo->button_name;
        $this->button_link = $getPromo->button_link;
        $this->description = $getPromo->description;
        $this->language_id = $getPromo->language_id;
        $this->type = $getPromo->type;
        $this->game_type = $getPromo->game_type;
        $this->terms = $getPromo->terms;
        $this->article = $getPromo->article;
        $this->image = $getPromo->image;

    }

    public function updatePromo() {

    }




    public function render()
    {
      
        return view('livewire.admin.promos.edit-promo', [
            'platformsData' => $this->getPlatforms(),
            'languages' => $this->getLanguage()
        ])->extends('layouts.app')->section('contents');
    }
}
