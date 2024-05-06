<?php

namespace App\Livewire\Admin\Promos;

use App\Models\Language;
use App\Models\Platform;
use App\Models\Promo;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class EditPromo extends Component
{
    use WithFileUploads;

    public $name, $promo_id, $is_visible, $is_featured, $slug, $language_id,  $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $old_image, $new_image;
    public $platforms = [];
    public $promo;

    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }

    public function getPlatforms() {
        return Platform::all();
    }

    public function getLanguage() {
        return Language::all();
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    // public function imageName() {
    //     $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
    //     $image = $this->image->storeAs('image_uploads', $imageName);
    //     return $image;
    // }

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
        
        $this->promo_id = $getPromo->id;
        $this->promo = $getPromo;
        $this->name = $getPromo->name;
        $this->slug = 'https://k8airdrop.com/promo/' . $getPromo->slug;
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
        $this->old_image = $getPromo->image;

        // dd($this->promo);

    }

    protected $rules = [
        'name' => 'required|max:255',
        'type' => 'required',
        'language_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'platforms' => 'required',
        'new_image' => 'nullable|max:512|dimensions:min_width=1388,min_height=750,max_width=1388,max_height=750',
    ];

    public function updatePromo() {

        $this->validate();

        $filename = '';
        if($this->new_image != null){
            $filename = $this->new_image->store('/', 'promo');
        } else {
            $filename = $this->old_image;
        }

        $this->promo->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name, '-', 'ja'),
            'type' => $this->type,
            'prize_pool' => $this->prize_pool,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'language_id' => $this->language_id,
            'game_type' => $this->game_type,
            'description' => $this->description,
            'terms' => $this->terms,
            'article' => $this->article,
            'button_name' => $this->button_name,
            'button_link' => $this->button_link,
            'is_visible' => $this->is_visible,
            'is_featured' => $this->is_featured,
            'is_banner' => $this->is_banner,
            'image' => $filename,
        ]);

        
        $count = count($this->promo->platforms);

        if($count == 0) {
            foreach($this->platforms as $key => $value) {
                $this->promo->platforms()->attach($this->platforms[$key]);
            }
        } else {
            $this->promo->platforms()->sync($this->platforms);  
        }

        $this->dispatch('updated');

    }


    public function render()
    {
        return view('livewire.admin.promos.edit-promo', [
            'platformsData' => $this->getPlatforms(),
            'languages' => $this->getLanguage()
        ])->extends('layouts.admin.app')->section('contents');
    }
}
