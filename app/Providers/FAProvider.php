<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FAProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		
       $this->app->bind('FA', function(){
            return new \App\Classes\FA;
        });
    }
}
