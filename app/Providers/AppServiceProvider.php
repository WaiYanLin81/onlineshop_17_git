<?php

namespace App\Providers;
use  App\Category;

use Illuminate\Support\ServiceProvider;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        
        $categoreis = Category::all();
        View::share('categories', $categoreis);
    }
}
