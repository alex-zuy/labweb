<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('full_name', function($attribute, $value, $parameters) {
            return preg_match('/\w+ \w+ \w+/', $value) === 1;
        });

        Validator::extend('selected', function($attribute, $value, $parameters) {
            return $value != 'unselected';
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
