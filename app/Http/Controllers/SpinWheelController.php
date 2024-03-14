<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpinWheelController extends Controller
{
    public function index() {
        return view('spin-the-wheel');
    }
}
