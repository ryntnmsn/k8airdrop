<?php

namespace App\Livewire\Admin\Promos;

use App\Models\Language;
use App\Models\Platform;
use App\Models\Promo;
use App\Models\Question;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreatePromo extends Component
{

    use WithFileUploads;

    public $name, $slug, $language_id, $is_visible, $is_featured, $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $image;
    public $platforms = [];


    public function generateSlug() {
        $this->slug = Str::slug($this->name, '-', 'ja');
    }

    public function getPlatforms() {
        return Platform::all();
    }

    public function getLanguages() {
        return Language::all();
    }

    protected $rules = [
        'name' => 'required|max:255|unique:promos,name',
        'slug' => 'required',
        'type' => 'required',
        'language_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        // 'platforms' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg|max:512|dimensions:min_width=1388,min_height=750,max_width=1388,max_height=750',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    //new image name
    public function imageName() {
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $image = $this->image->store('/', 'promo');
        return $image;
    }

    //store data
    public function store() {
        $this->validate();

        $status = (isset($this->is_visible) == '0' ? '0' : '1');

        $featured = (isset($this->is_featured) == '0' ? '0' : '1');

        $banner = (isset($this->is_banner) == '0' ? '0' : '1');

        $promo = Promo::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name, '-', 'ja'),
            'language_id' => $this->language_id,
            'description' => $this->description,
            'terms' => $this->terms,
            'article' => $this->article,
            'prize_pool' => $this->prize_pool,
            'is_visible' => $status,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'type' => $this->type,
            'game_type' => $this->game_type,
            'is_banner' => $banner,
            'is_featured' => $featured,
            'button_name' => $this->button_name,
            'button_link' => $this->button_link,
            'image' => $this->imageName()
        ]);


        foreach($this->platforms as $key => $value) {
            $promo->platforms()->attach($this->platforms[$key]);
        }

        // foreach($this->questionTitle as $key => $value) {
        //     Question::create([
        //         'title' => $this->questionTitle[$key],
        //         'type' => $this->questionTitle[$key],
        //         'promo_id' => $promo->id,
        //     ]);
        // }

        $this->platforms = [];

        $this->dispatch('created', [
            'title' => 'Created',
            'text' => 'Promo created successfully.',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);

        $this->reset();
    }

    public function render()
    {
        // dump($this->platforms);
        return view('livewire.admin.promos.create-promo',[
            'platformsData' => $this->getPlatforms(),
            'languages' => $this->getLanguages(),
        ])->extends('layouts.admin.app')->section('contents');
    }
}
