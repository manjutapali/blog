<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
     /*Feteches the servie provide on requested. But, here boot method is 
     should be loaded in every page */
    // protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout.sidebar', function($view) {

            $view->with('archives', \App\posts::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->Singleton(Stripe::class, function($app){
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
