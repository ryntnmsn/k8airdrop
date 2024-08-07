<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\NewsletterSubscriptionController;
use App\Http\Controllers\SpinWheelController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Livewire\Admin\Article\CreateArticle;
use App\Livewire\Admin\Article\EditArticle;
use App\Livewire\Admin\Article\IndexArticle;
use App\Livewire\Admin\Articlecategory\CreateArticleCategory;
use App\Livewire\Admin\Articlecategory\EditArticleCategory;
use App\Livewire\Admin\Articlecategory\IndexArticleCategory;
use App\Livewire\Admin\ArticleSubCategory\IndexArticleSubCategory;
use App\Livewire\Admin\Articletag\IndexArticleTag;
use App\Livewire\Admin\Carousels\CreateCarousel;
use App\Livewire\Admin\Carousels\EditCarousel;
use App\Livewire\Admin\Carousels\IndexCarousel;
use App\Livewire\Admin\Clicktracker\ClickTrackerIndex;
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
use App\Livewire\Admin\Subscription\IndexSubscription;
use App\Livewire\Admin\Users\UsersIndex;
use App\Livewire\Admin\Wheel\SpinTheWheel;
use App\Livewire\Admin\Wheel\SpinUserFaker;
use App\Livewire\Admin\Wheel\SpinUsers;
use App\Livewire\Home\Auth\ForgotPassword;
use App\Livewire\Home\Auth\IndexLogin;
use App\Livewire\Home\Auth\IndexRegister;
use App\Livewire\Home\Auth\ResetPassword;
use App\Livewire\Home\Auth\TokenExpired;
use App\Livewire\Home\IndexDashboard;
use App\Livewire\Home\IndexHome;
use App\Livewire\Home\IndexMedia;
use App\Livewire\Home\IndexPromoPage;
use App\Livewire\Home\IndexUserAccount;
use App\Livewire\Home\News\IndexNews;
use App\Livewire\Home\News\IndexNewsCategory;
use App\Livewire\Home\Mascot\IndexMascot;
use App\Livewire\Home\News\IndexNewsLatest;
use App\Livewire\Home\News\IndexNewsSingle;
use App\Livewire\Home\News\IndexNewsSubCategory;
use App\Livewire\Home\News\IndexNewsTrending;
use App\Livewire\Home\Promos\IndexPromos;
use App\Livewire\Home\SinglePromo;
use App\Livewire\Home\Wheel\SpinWheel;
use App\Livewire\Home\Wheel\SpinWheelDashboard;
use App\Models\Subscription;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


// Route::get('/placeholder', function () {
//     return view('placeholder');
// });

Route::get('/', IndexHome::class)->name('home.index');
Route::get('/promo/{slug}', SinglePromo::class)->name('single.promo');
Route::get('/promos', IndexPromoPage::class)->name('index.promos');
Route::get('/media', IndexMedia::class)->name('index.media');

//Newsletter Subscription
// Route::controller(NewsletterSubscriptionController::class)->group(function (){
//     Route::get('/subscribe-newsletter', 'store')->name('newsletter.store');
// });

//user auth classes
Route::middleware(RedirectIfAuthenticated::class)->group(function() {
    Route::get('/register', IndexRegister::class)->name('user.register');
    Route::get('/login', IndexLogin::class)->name('user.login');
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot.password');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('reset.password');
    Route::get('/token-expired', TokenExpired::class)->name('token.expired');
});

//Home Mascot
Route::get('/hachimaru', IndexMascot::class)->name('index.mascot');


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
    Route::get('/category/how-to-guides/{slug}', IndexNewsSubCategory::class)->name('news.sub.category.index');
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

        //Article Sub categories Class
        Route::group(['prefix' => 'articles/subcategories'], function () {
            Route::get('/', IndexArticleSubCategory::class)->name('articles.subcategories.index');
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
            Route::get('/users', SpinUsers::class)->name('spinthewheel.users.index');
            Route::get('/user-faker', SpinUserFaker::class)->name('spinuserfaker.index');
        });

        //Subscription class
        Route::group(['prefix' => 'subscriptions'], function () {
            Route::get('/', IndexSubscription::class)->name('subscription.index');
        });

        //Subscription class
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', UsersIndex::class)->name('user.index');
        });

        //Track Click
        Route::group(['prefix' => 'click-tracker'], function () {
            Route::get('/', ClickTrackerIndex::class)->name('tracker.click.index');
        });
        
        //Exports
        Route::controller(ExportController::class)->group(function () {
            Route::get('/promo-participants/{id}', 'exportPromoParticipants')->name('export.promo.participants');
            Route::get('/english-subscribers', 'exportEnglishSubscribers')->name('export.english.subscribers');
            Route::get('/japan-subscribers', 'exportJapanSubscribers')->name('export.japan.subscribers');
        });
        
    });
});


//REDIRECT SNS LINKS ENGLISH
Route::get('/fben', function() {
    return redirect('https://www.facebook.com/k8.io.official'); // facebook
 })->name('enFacebook');

 Route::get('/twxen', function() {
    return redirect('https://twitter.com/k8official_en'); // twitter
 })->name('enTwitter');

 Route::get('/instaen', function() {
    return redirect('https://www.instagram.com/_k8gaming/'); // instagram
 })->name('enInstagram');

 Route::get('/yten', function() {
    return redirect('https://www.youtube.com/@K8-ZONE'); // youtube
 })->name('enYoutube');

 Route::get('/teleen', function() {
    return redirect('https://t.me/k8casino'); // telegram
 })->name('enTelegram');

 Route::get('/discord', function() {
    return redirect('https://discord.gg/m7aV5kRF4w'); //discord
 })->name('enDiscord');

 Route::get('/tiktoken', function() {
    return redirect('https://prelink.co/k8tiktokeng'); // tiktok
 })->name('enTiktok');

 Route::get('/twitchen', function() {
    return redirect('https://www.twitch.tv/k8casino'); // twitch
 })->name('enTwitch');

 Route::get('/forum', function() {
    return redirect('https://www.k8forum.io/'); // forum
 })->name('k8forum');
 
 
 // REDIRECT SNS LINK JAPAN
  Route::get('/ytjp', function() {
    return redirect('https://www.youtube.com/@K8Pachi'); // youtube
 })->name('jpYoutube');
 
Route::get('/tgcn', function() {
    return redirect('https://t.me/K8news'); // telegram
 })->name('jpTelegram');

 Route::get('/instajp', function() {
    return redirect('https://www.instagram.com/k8.io_japan/'); // instagram
 })->name('jpInstagram');

 Route::get('/twxjp', function() {
    return redirect('https://www.twitter.com/k8official_jp'); // twitter
 })->name('jpTwitter');

 Route::get('/twitchjp', function() {
    return redirect('https://www.twitch.tv/k8_official_jp'); // twitch
 })->name('jpTwitch');

 Route::get('/linejp', function() {
    return redirect('https://liff.line.me/1645278921-kWRPP32q/?accountId=510ftlxl'); // line
 })->name('jpLine');


 Route::get('/share', function() {
    return view('share');
 });

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});


Route::get('/88birthday', function() {
    return redirect('https://k8airdrop.com/promo/ba-wan-nodan-sheng-ri-ji-shang-jin-zong-e-3960');
});

Route::get('/k8pplaylucky', function() {
    return redirect('https://k8airdrop.com/promo/puragumateitsukupureitogong-ni-k8-yi-shi-jie-tan-jian');
});




//Redirections

Route::get('/promo/crtie-quan-2-dou-shen-verwoshi-ting-shite-shang-jin-getchiyansu/yVPXMk', function () {
    return redirect('https://k8airdrop.com/promo/crtie-quan-2-dou-shen-verwoshi-ting-shite-shang-jin-getchiyansu');
});

Route::get('/promo/crmonsutahantawoshi-ting-shite-shang-jin-getchiyansu/nxf7Gn', function () {
    return redirect('https://k8airdrop.com/promo/crmonsutahantawoshi-ting-shite-shang-jin-getchiyansu');
});


