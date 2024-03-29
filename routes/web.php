<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpinWheelController;
use App\Http\Middleware\RedirectIfAuthenticated;
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
use App\Livewire\Admin\Wheel\SpinTheWheel;
use App\Livewire\Admin\Wheel\SpinUserFaker;
use App\Livewire\Home\Auth\IndexLogin;
use App\Livewire\Home\Auth\IndexRegister;
use App\Livewire\Home\IndexDashboard;
use App\Livewire\Home\IndexHome;
use App\Livewire\Home\IndexUserAccount;
use App\Livewire\Home\News\IndexNews;
use App\Livewire\Home\News\IndexNewsCategory;
use App\Livewire\Home\News\IndexNewsLatest;
use App\Livewire\Home\News\IndexNewsSingle;
use App\Livewire\Home\News\IndexNewsTrending;
use App\Livewire\Home\SinglePromo;
use App\Livewire\Home\Wheel\SpinWheel;
use App\Livewire\Home\Wheel\SpinWheelDashboard;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


// Route::get('/placeholder', function () {
//     return view('placeholder');
// });

Route::get('/', IndexHome::class)->name('home.index');
Route::get('/promo/{slug}', SinglePromo::class)->name('single.promo');

//user auth classes
Route::middleware(RedirectIfAuthenticated::class)->group(function() {
    Route::get('/register', IndexRegister::class)->name('user.register');
    Route::get('/login', IndexLogin::class)->name('user.login');
});

//user dashboard
Route::middleware('auth')->group(function() {
    Route::get('/user/dashboard', IndexDashboard::class)->name('user.dashboard');
    Route::post('/user/logout', [AuthController::class, 'userLogout'])->name('user.logout');
    //spin the wheel
    Route::get('spin-the-wheel', SpinWheel::class)->name('spin.wheel');
    Route::get('/user/spin-the-wheel', SpinWheelDashboard::class)->name('spin.wheel.dashboard');
    Route::get('/user/account', IndexUserAccount::class)->name('user.account');
});


//news class
Route::group(['prefix' => 'news'], function () {
    Route::get('/', IndexNews::class)->name('news.index');
    Route::get('/latest', IndexNewsLatest::class)->name('news.latest.index');
    Route::get('/category/{slug}', IndexNewsCategory::class)->name('news.category.index');
    Route::get('/{slug}', IndexNewsSingle::class)->name('news.single.index');
});

//admin auth controller
Route::controller(AuthController::class)->group(function() {
    Route::get('/k8admin', 'index')->name('auth.index');
    Route::post('admin/login', 'login')->name('auth.login');
    Route::post('admin/logout', 'logout')->middleware('auth')->name('auth.logout');
});

Route::middleware('auth', 'admin')->group(function() {
    Route::group(['prefix' => 'k8admin'], function() {
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

        //Spin the Wheel Class
        Route::group(['prefix' => 'spin-the-wheel'], function () {
            Route::get('/', SpinTheWheel::class)->name('spinthewheel.index');
            Route::get('/user-faker', SpinUserFaker::class)->name('spinuserfaker.index');
        });
        

    });
});



