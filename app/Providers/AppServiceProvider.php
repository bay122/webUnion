<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Services\Access;
use App\Http\ViewComposers\MenuComposer;
use App\Http\ViewComposers\HeaderComposer;
use Laravel\Dusk\DuskServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setLocale(LC_TIME, config('app.locale'));

        View::share('base_css', "css/views/");
        View::share('include_css', array());
        
        View::share('base_javascript', "js/views/");
        View::share('include_javascript', array());

        view()->composer('front/layout',MenuComposer::class);

        //view()->composer('front/layout_OLD',MenuComposer::class);

        view()->composer('back/layout',HeaderComposer::class);

        Blade::if('admin', function () {
            return auth()->user()->role === 'admin';
        });

        Blade::if('redac', function ($only = true) {
        	if($only){
            	return auth()->user()->role === 'redac';
        	}
        	else{
        		return (auth()->user()->role === 'redac' || auth()->user()->role === 'admin');
        	}
        });

        Blade::if('ministerio', function ($id_ministerio = null) {
        	if(auth()->user()->role === 'admin'){
        		return true;
        	}else{
        		return Access::puedeVer($id_ministerio);
        	}
        });

        Blade::if('tripulante', function ($only = true) {
        	if($only){
            	return auth()->user()->role === 'tripulante';
        	}
        	else{
        		return (auth()->user()->role === 'tripulante' || auth()->user()->role === 'admin');
        	}
        });

        Blade::if('request', function ($url) {
            return request()->is($url);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
