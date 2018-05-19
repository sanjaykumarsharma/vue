<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // You can use a class for composer
        // you will need MenuTagComposer@compose method
        // which will be called everythime partials.nav is requested
        View::composer(
            'layouts.header', 'App\Http\ViewComposers\MenuTagComposer'
        );

        // You can use Closure based composers
        // which will be used to resolve any data
        // in this case we will pass menu items from database
        // View::composer('partials.nav', function ($view) {
        //     $view->with('menu', Nav::all());
        // });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
