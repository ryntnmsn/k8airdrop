<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Livewire\Admin\Platforms\CreatePlatform;
use App\Livewire\Admin\Platforms\EditPlatform;
use App\Livewire\Admin\Platforms\IndexPlatform;
use App\Livewire\Admin\Languages\CreateLanguage;
use App\Livewire\Admin\Languages\EditLanguage;
use App\Livewire\Admin\Languages\IndexLanguage;
use App\Livewire\Admin\Promos\CreatePromo;
use App\Livewire\Admin\Promos\EditPromo;
use App\Livewire\Admin\Promos\IndexPromo;
use App\Livewire\Admin\Promos\ViewPromo;
use App\Livewire\Admin\Question\CreateQuestion;
use App\Livewire\Admin\Question\EditQuestion;
use Illuminate\Support\Facades\Route;


//auth controller
Route::controller(AuthController::class)->group(function() {
    Route::get('/', 'index')->name('auth.index');
    Route::post('login', 'login')->name('auth.login');
    Route::post('logout', 'logout')->middleware('auth')->name('auth.logout');
});



Route::middleware('auth')->group(function() {

    Route::group(['prefix' => 'admin'], function() {
        //Dashboard Class
        Route::controller(DashboardController::class)->group(function() {
            Route::get('dashboard', 'index')->name('dashboard.index');
        });

        //Platforms Class
        Route::group(['prefix' => 'platforms', 'namespace' => 'App\Livewire\Admin\Platforms'], function () {
            Route::get('/', IndexPlatform::class)->name('platforms.index');
            Route::get('/create', CreatePlatform::class)->name('platforms.create');
            Route::get('/edit/{platform}', EditPlatform::class)->name('platforms.edit');
        });

        //Languages Class
        Route::group(['prefix' => 'languages', 'namespace' => 'App\Livewire\Admin\Languages'], function () {
            Route::get('/', IndexLanguage::class)->name('languages.index');
            Route::get('/create', CreateLanguage::class)->name('languages.create');
            Route::get('/edit/{language}', EditLanguage::class)->name('languages.edit');
        });

        //Promos Class
        Route::group(['prefix' => 'promos'], function () {
            Route::get('/', IndexPromo::class)->name('promos.index');
            Route::get('/create', CreatePromo::class)->name('promos.create');
            Route::get('/edit/{id}', EditPromo::class)->name('promos.edit');
            Route::get('/view/{id}', ViewPromo::class)->name('promos.view');
            Route::get('/{promo}/question/create', CreateQuestion::class)->name('question.create');
            Route::get('/{promo}/question/edit/{question}', EditQuestion::class)->name('question.edit');
        });


        Route::get('/playroom', function () {
            return view('playroom');
        });
    });



});



