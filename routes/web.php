<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Livewire\Admin\Platforms\Create;
use App\Livewire\Admin\Platforms\Edit;
use App\Livewire\Admin\Platforms\Index;
use Illuminate\Support\Facades\Route;


//auth controller
Route::controller(AuthController::class)->group(function() {
    Route::get('/', 'index')->name('auth.index');
    Route::post('login', 'login')->name('auth.login');
    Route::post('logout', 'logout')->middleware('auth')->name('auth.logout');
});



Route::middleware('auth')->group(function() {

    //Dashboard Class
    Route::controller(DashboardController::class)->group(function() {
        Route::get('dashboard', 'index')->name('dashboard.index');
    });

    //Platform Class
    Route::get('platforms', Index::class)->name('platforms.index');
    Route::get('platforms/create', Create::class)->name('platforms.create');
    Route::get('platforms/edit/{platform}', Edit::class)->name('platforms.edit');

});



