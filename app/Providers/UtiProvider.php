<?php

namespace App\Providers;
use App;
use Illuminate\Support\ServiceProvider;

class UtiProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
         App::bind('Utilisateur', function(){
           return new App\Utilisateur;

 });
    }
}
