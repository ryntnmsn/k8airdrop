<?php

namespace App\Livewire\Home\Wheel;

use App\Models\UserSpin;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Livewire\Component;

class SpinWheel extends Component
{
    public $rewards;
    public $isJoined = true;
    public $userNames;

    public function mount() {
        //check if user already spin the wheel
        if(auth()->user()) {
            $userId = auth()->user()->id;
            
            $userExists = UserSpin::where('user_id', $userId)->whereDate('joined_date', Carbon::now()->format('Y-m-d'))->exists();

            if($userExists == true) {
                $this->isJoined = true;
            } else {
                $this->isJoined = false;
            }
        }

        $array = [
            '100' => 20, 
            '200' => 20, 
            '300' => 15, 
            '400' => 10,
            '500' => 10, 
            '600' => 10, 
            '700' => 10,
            '800' => 5
        ];
        
        $mostDecimals = 0;
        foreach ($array as $value => $weight) {
            $tempDecimals = 0;
            while ((string)$weight !== (string)floor($weight)) {
                $weight *= 10; 
                ++$tempDecimals;
            }
            $mostDecimals = max($mostDecimals, $tempDecimals);
        }

        $factor = pow(10, $mostDecimals);

        $totalWeight = (array_sum($array) - 1) * $factor;

        for ($i = 0; $i < 10; ++$i) {
            $rand = mt_rand(0, $totalWeight);
            $cumulativeScaledWeight = 0;
            foreach ($array as $value => $weight) {
                $cumulativeScaledWeight += $weight * $factor;
                if ($rand < $cumulativeScaledWeight) {
                    // echo "Value: {$value}\n";
                    break;
                }
            }
        }

        $this->rewards = $value;

        $this->userFaker();
        // dd($this->rewards);
    }

    public function spinWheel() {
        UserSpin::create([
            'user_id' => auth()->user()->id,
            'rewards' => $this->rewards,
            'joined_date' => Carbon::now()->format('Y-m-d'),
            'ip' => \Request::ip(),
        ]);
    }

    public function userFaker() {
        $userNames = [
            'Stietenv4',
            'njwordho',
            'vanillaski3v',
            'Mekinjamiq',
            'sapaira6h',
            'svest5y',
            'mahastory5t',
            'bulokovadq',
            'Cherascond',
            'graphismlinksci',
            'anglesce',
            'hyzticxwl',
            'da2timy4',
            'apatzatss1',
            'livriranazk',
            'Jelah5w',
            'eshaelkag2',
            'embaurart9',
            'votornTutlc',
            'Berghain0t',
            'subirexn',
            'sprkyldyyk',
            'pristan6h',
            'Dennunzio3i',
            'graceful87qo',
            'kalimijnfz',
            'silha2i',
            'detassato1f',
            'pithogjf',
            'sikahertem',
        ];

        foreach($userNames as $name) {
            $fakeNames[] = $name;
        }

        // $this->userNames = Arr::random($fakeNames);
        shuffle($fakeNames);

        $this->userNames = $fakeNames;
        // dd($fakeNames);
    }


    public function render()
    {
        return view('livewire.home.wheel.spin-wheel')
            ->extends('layouts.home.app')->section('contents');
    }
}
