<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $users = User::all();
        $promos = Promo::all();
        
        $newUsers = User::whereDate('created_at', Carbon::today())->get();

        $subscribers = Subscription::all();

        return view('dashboard', [
            'user' => auth()->user(),
            'users' => $users,
            'promos' => $promos,
            'newUsers' => $newUsers,
            'subscribers' => $subscribers,
        ]);
    }

}
