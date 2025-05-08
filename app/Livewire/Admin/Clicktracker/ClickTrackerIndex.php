<?php

namespace App\Livewire\Admin\Clicktracker;

use Livewire\Component;
use App\Models\TrackClick;
use Carbon\Carbon;

class ClickTrackerIndex extends Component
{
    public function render()
    {
        $clickTracker = TrackClick::all();

        $totalClicksToday = TrackClick::where('click_date', Carbon::now()->format('Y-m-d'))->get();

        // $clickTrackerTable = TrackClick::get()
        //     ->groupBy(fn($pv) => $pv->created_at->format('Y-m-d'))
        //     ->map(fn($date) => count($date));

        // dd($clickTrackerTable);


        $clickTrackerTable = TrackClick::all();



        return view('livewire.admin.clicktracker.click-tracker-index', [
            'clickTracker' => $clickTracker,
            'totalClicksToday' => $totalClicksToday,
            'clickTrackerTable' => $clickTrackerTable
        ])->extends('layouts.admin.app')->section('contents');
    }
}
