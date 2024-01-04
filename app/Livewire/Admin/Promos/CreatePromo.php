<?php

namespace App\Livewire\Admin\Promos;

use App\Models\Language;
use App\Models\Platform;
use App\Models\Promo;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreatePromo extends Component
{

    use WithFileUploads;

    public $name, $slug, $language_id, $is_visible, $is_featured, $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $image;

    public function generateSlug() {
        $this->slug = Str::slug($this->name);
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
        'image' => 'required',
    ];

    public function imageName() {
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $image = $this->image->storeAs('image_uploads', $imageName);
        return $image;
    }

    public function store() {
        $this->validate();

        $status = (isset($this->is_visible) == '0' ? '0' : '1');

        Promo::create([
            'name' => $this->name,
            'slug' => $this->slug,
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
            'is_banner' => $this->is_banner,
            'is_featured' => $this->is_featured,
            'button_name' => $this->button_name,
            'button_link' => $this->button_link,
            'image' => $this->imageName()
        ]);

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
        return view('livewire.admin.promos.create-promo',[
            'platforms' => $this->getPlatforms(),
            'languages' => $this->getLanguages(),
        ])->extends('layouts.app')->section('contents');
    }
}
