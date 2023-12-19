<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlatformController;
use App\Livewire\Platforms\CreatePlatform;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//auth controller
Route::controller(AuthController::class)->group(function() {
    Route::get('/', 'index')->name('auth.index');
    Route::post('login', 'login')->name('auth.login');
    Route::post('logout', 'logout')->middleware('auth')->name('auth.logout');
});



Route::middleware('auth')->group(function() {
    //dashboard controller
    Route::controller(DashboardController::class)->group(function() {
        Route::get('dashboard', 'index')->name('dashboard.index');
    });

    //platforms
    Route::resource('platforms', PlatformController::class);

});



