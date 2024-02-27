<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Livewire\Admin\Article\CreateArticle;
use App\Livewire\Admin\Article\EditArticle;
use App\Livewire\Admin\Article\IndexArticle;
use App\Livewire\Admin\Articlecategory\CreateArticleCategory;
use App\Livewire\Admin\Articlecategory\EditArticleCategory;
use App\Livewire\Admin\Articlecategory\IndexArticleCategory;
use App\Livewire\Admin\Articletag\IndexArticleTag;
use App\Livewire\Admin\Carousels\CreateCarousel;
use App\Livewire\Admin\Carousels\EditCarousel;
use App\Livewire\Admin\Carousels\IndexCarousel;
use App\Livewire\Admin\FeatureGames\CreateFeatureGame;
use App\Livewire\Admin\FeatureGames\EditFeatureGame;
use App\Livewire\Admin\FeatureGames\IndexFeatureGame;
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
use App\Livewire\Home\IndexHome;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;



// Route::get('/playroom', function () {
//     $ip = '175.45.142.131'; //For static IP address get (JAPAN)
//     //$ip = '103.100.137.255'; //For static IP address get (PH)
//     $data = \Location::get($ip);
//     $locale = strtolower($data->countryCode);
//     $appLocale = App::setLocale($locale);
//     return view('playroom', ['appLocale' => $locale]);
// });



// $ip = '175.45.142.131'; //For static IP address get (JAPAN)
// //$ip = '103.100.137.255'; //For static IP address get (PHILIPPINES)
// $data = \Location::get($ip);
// $locale = strtolower($data->countryCode);
// if($locale == 'jp') {
//     App::setLocale($locale);
//     // Carbon::setlocale('ja');
// } else {
//     App::setLocale('en');
// }


//auth controller
Route::controller(AuthController::class)->group(function() {
    Route::get('/admin', 'index')->name('auth.index');
    Route::post('admin/login', 'login')->name('auth.login');
    Route::post('admin/logout', 'logout')->middleware('auth')->name('auth.logout');
});


Route::get('/', IndexHome::class)->name('home.index');

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

        //Articles Class
        Route::group(['prefix' => 'articles'], function () {
            Route::get('/', IndexArticle::class)->name('articles.index');
            Route::get('/create', CreateArticle::class)->name('articles.create');
            Route::get('/edit/{article}', EditArticle::class)->name('articles.edit');
        });

        //Article Categories Class
        Route::group(['prefix' => 'articles/categories'], function () {
            Route::get('/', IndexArticleCategory::class)->name('articles.categories.index');
        });

        //Article Tags Class
        Route::group(['prefix' => 'articles/tags'], function () {
            Route::get('/', IndexArticleTag::class)->name('articles.tags.index');
        });

        //Featured Games Class
        Route::group(['prefix' => 'featured-games'], function () {
            Route::get('/', IndexFeatureGame::class)->name('featured.games.index');
            Route::get('/create', CreateFeatureGame::class)->name('featured.games.create');
            Route::get('/edit/{featuredGames}', EditFeatureGame::class)->name('featured.games.edit');
        });

        //Carousels Class
        Route::group(['prefix' => 'carousels'], function () {
            Route::get('/', IndexCarousel::class)->name('carousel.index');
            Route::get('/create', CreateCarousel::class)->name('carousel.create');
            Route::get('/edit/{carousel}', EditCarousel::class)->name('carousel.edit');
        });

        
    });
});



