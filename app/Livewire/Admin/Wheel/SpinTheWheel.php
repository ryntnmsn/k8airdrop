<?php

namespace App\Livewire\Admin\Wheel;

use App\Models\SpinTheWheel as ModelsSpinTheWheel;
use App\Models\SpinTheWheelSetting;
use Livewire\Component;

class SpinTheWheel extends Component
{

    public $winners_count = '', $name = '', $rewards = '', $probability = '', $wheelID;
    public $totalWinners, $totalWinnersID;

    protected $rules = [
        'name' => 'required',
        'rewards' => 'required|numeric',
        'probability' => 'required|numeric'
    ];

    public function editSpinWheel($id) {
        $spinTheWheel = ModelsSpinTheWheel::where('id', $id)->first();
        $this->wheelID = $spinTheWheel->id;
        $this->name = $spinTheWheel->name;
        $this->rewards = $spinTheWheel->rewards;
        $this->probability = $spinTheWheel->probability;
        $this->winners_count = $spinTheWheel->winners_count;
    }

    public function updateSpinTheWheel() {
        $this->validate();
        $spinTheWheel = ModelsSpinTheWheel::findOrFail($this->wheelID);
        $spinTheWheel->update([
            'name' => $this->name,
            'rewards' => $this->rewards,
            'probability' => $this->probability,
            'winners_count' => $this->winners_count,
        ]);
        $this->js('window.location.reload()');
    }

    public function updateSpinWheelSettings(){
        // $this->validate([
        //     'totalWinners' => 'required|numeric|max:3'
        // ]);
        
        $spinTheWheelSettings = SpinTheWheelSetting::latest()->first();

        $spinTheWheelSettings->update([
            'total_winners' => $this->totalWinners
        ]);

        $this->js('window.location.reload()');
       
    }


    public function render()
    {
        $totalWinners = SpinTheWheelSetting::latest()->first(); 
        $this->totalWinners = $totalWinners->total_winners;

        $wheel = ModelsSpinTheWheel::all();
        return view('livewire.admin.wheel.spin-the-wheel', [
            'wheels' => $wheel
        ])->extends('layouts.admin.app')->section('contents');
    }
}
