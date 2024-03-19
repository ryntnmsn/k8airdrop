<?php

namespace App\Livewire\Home\Wheel;

use App\Models\UserSpin;
use App\Models\SpinTheWheel;
use App\Models\SpinTheWheelSetting;
use App\Models\UserFaker;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Livewire\Component;

class SpinWheel extends Component
{
    public $rewards;
    public $isJoined = true;
    public $users;
    public $wheels;
    public $maxWinners = true;
    public $winnersCount;

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


        $this->winnersCount = UserSpin::whereDate('joined_date', Carbon::now()->format('Y-m-d'))->where('is_winner', 1)->get();

        $spinTheWheelSetting = SpinTheWheelSetting::latest()->first();

        $maxWinnersCount = count($this->winnersCount);

        $this->wheels = SpinTheWheel::all();

        $array = [];
        if($maxWinnersCount == $spinTheWheelSetting->total_winners) {
            $array = [
                '0' => '1',
                '0' => '2',
                '0' => '3'
            ];
        } else {
            foreach ($this->wheels as $key => $wheel) {
                $temp_arr = "key".$key . '_' . $wheel->rewards;
                $array[$temp_arr] = intval($wheel->probability);
            }
        }

        // dd($array);

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
        
        $this->rewards = preg_replace('/key[0-9]+_/', '', $value);

        $this->userFaker();

        // dd($maxWinnersCount);
    }



    public function spinWheel() {

        $is_winner = 0;
        if($this->rewards == 0) {
                $is_winner = 0;
        } else {
            $is_winner = 1;
        }

        UserSpin::create([
            'user_id' => auth()->user()->id,
            'rewards' => $this->rewards,
            'joined_date' => Carbon::now()->format('Y-m-d'),
            'is_winner' => $is_winner,
            'ip' => \Request::ip(),
        ]);
    }

    public function userFaker() {
        
        $this->users = UserFaker::inRandomOrder()->get();

    }


    public function render()
    {
        return view('livewire.home.wheel.spin-wheel')
            ->extends('layouts.home.app')->section('contents');
    }
}
