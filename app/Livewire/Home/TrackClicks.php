<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Models\TrackClick;
use Carbon\Carbon;

class TrackClicks extends Component
{

    public function trackClick() {
        TrackClick::create([
            'link' => 'Discord',
            'click_date' => Carbon::now()->format('Y-m-d'),
            'code' => app()->getLocale()
        ]);
    }

    public function render()
    {
        return view('livewire.home.track-clicks');
    }
}