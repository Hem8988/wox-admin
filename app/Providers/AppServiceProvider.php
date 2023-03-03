<?php

namespace App\Providers;

use App\SiteInformation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
		Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');

        view()->composer(['layouts.frontend','contact','layouts.agent','layouts.agentfrontend','layouts.agent-login'], function ($view) {
            $view->with('sites',  SiteInformation::all());
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
