<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;

use App\Models\Post;
use App\Observers\PostObserver;
use App\Models\Theme;
use App\Observers\ThemeObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //check if the app is running in production ... if so force it to use https
        if( config('app.env') === 'production') {
            //force any links created to use https
            URL::forceScheme('https');
        }

        //view composer
        View::composer(['layouts.app'], function($view) {
            //pass data to the view
            $themeList = Theme::all();
            $selectedTheme = Cookie::get('selectedTheme');
            $bootswatchCDN = $themeList->firstWhere('name', '=', $selectedTheme)->cdn_url ?? "";

            $view->with('themeList', $themeList)->with('selectedTheme', $selectedTheme)->with('bootswatchCDN', $bootswatchCDN);
        });

        Post::observe(PostObserver::class);
        Theme::observe(ThemeObserver::class);
    }
}
