<?php

namespace App\Providers;

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
		 //if(env('FORCE_HTTPS')) {
			//URL::forceScheme('https');
		//}
		//if (App::environment('remote')) {
			//URL::forceSchema('https');
		//}
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
