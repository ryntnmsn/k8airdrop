<?php

namespace App\Livewire\Home;

use App\Models\Platform;
use App\Models\Promo;
use Carbon\Carbon;
use Livewire\Component;

class SinglePromo extends Component
{

    public $promo_id, $next_record, $previous_record, $days_left, $name, $slug, $language_id, $is_visible, $is_featured, $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $image;
    public $platforms;


    public function nextRecord() {
        $lang = app()->getLocale();
        $next_record = Promo::where('id', '>' , $this->promo_id)
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
        })->first();

        if($next_record == null) {
            $loop_record = Promo::orderBy('id', 'asc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
            })->first();
            $this->redirectRoute('single.promo', ['slug' => $loop_record->slug]);
        } else {
            $this->redirectRoute('single.promo', ['slug' => $next_record->slug]);
        }
    }

    public function previousRecord() {
        $lang = app()->getLocale();
        $previous_record = Promo::where('id', '<' , $this->promo_id)->orderBy('id', 'desc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
        })->first();

        if($previous_record == null) {
            $loop_record = Promo::orderBy('id', 'desc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
            })->first();
            $this->redirectRoute('single.promo', ['slug' => $loop_record->slug]);
        } else {
            $this->redirectRoute('single.promo', ['slug' => $previous_record->slug]);
        }
    }

    public function mount($slug) {
        $lang = app()->getLocale();
        $promo = Promo::with('platforms')->where('slug', $slug)->first();
        $this->platforms = $promo->platforms()->get();

        $parseStartDate = Carbon::parse($promo->start_date);
        $parseEndDate = Carbon::parse($promo->end_date);
        $this->days_left = Carbon::parse(Carbon::now())->diffInDays($parseEndDate ,false) + 1;

        // dd($this->platforms);
        $this->promo_id = $promo->id;
        $this->name = $promo->name;
        $this->image = $promo->image;
        $this->start_date = $promo->start_date;
        $this->end_date = $promo->end_date;
        $this->prize_pool = $promo->prize_pool;
        $this->type = $promo->type;
        $this->game_type = $promo->game_type;
        $this->description = $promo->description;
        $this->terms = $promo->terms;
        $this->article = $promo->article;
        $this->button_name = $promo->button_name;
        $this->button_link = $promo->button_link;


        //Next record
        $nextRecord = Promo::where('id', '>' , $this->promo_id)
        ->whereHas('language', function ($query) use ($lang) {
            return $query->where('code', $lang);
        })->first();

        if($nextRecord == null) {
            $nextRecordLoop = Promo::orderBy('id', 'asc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
            })->first();
            $this->next_record = $nextRecordLoop->name;
        } else {
            $this->next_record = $nextRecord->name;
        }

        //Previous record
        $previousRecord = Promo::where('id', '<' , $this->promo_id)->orderBy('id', 'desc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
        })->first();

        if($previousRecord == null) {
            $previousRecordLoop = Promo::orderBy('id', 'desc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
            })->first();
            $this->previous_record = $previousRecordLoop->name;
        } else {
            $this->previous_record = $previousRecord->name;
        }
    }

    public function render()
    {
        $lang = app()->getLocale();

        $getPromos = Promo::where('is_visible', '1')->orderBy('created_at', 'desc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
            })->limit(6);

        $getPlatforms = Platform::where('is_visible', '1');

        return view('livewire.home.single-promo', [
            'getPromos' => $getPromos->get(),
            'getPlatforms' => $getPlatforms->get(),
        ])->extends('layouts.home.app')->section('contents');
    }
}
