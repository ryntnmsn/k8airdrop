<?php

namespace App\Providers;

use App\Models\ArticleSubCategory;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // if(env('APP_SERVER') !== 'local')
        // {
        //     URL::forceScheme('http');
        // }

        $ip = \Request::ip();
        //$ip = '175.45.142.131'; //For static IP address get (JAPAN)
        //$ip = '103.100.137.255'; //For static IP address get (PHILIPPINES)
        $data = \Location::get($ip);
        $locale = strtolower($data->countryCode);
        if($locale == 'jp') {
            App::setLocale($locale);
            // Carbon::setlocale('ja');
        } else {
            App::setLocale('en');
        }

        $newsSubCategories = ArticleSubCategory::all();
        view()->share('newsSubCategories', $newsSubCategories);
    }
}
