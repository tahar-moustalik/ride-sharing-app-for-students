<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Routing\UrlGenerator ;
class AppServiceProvider extends ServiceProvider
{
    public function boot(UrlGenerator $url)
    {
            $url->formatScheme('https');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

            $this->app['request']->server->set('HTTPS', true);

    }
}
