<?php

namespace UiStacks\Messages;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MessagesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        |--------------------------------------------------------------------------
        | Configration
        |--------------------------------------------------------------------------
        */

        // The package configration have not been published. Use the defaults.
        $this->mergeConfigFrom(
            __DIR__.'/config/messages.php', 'messages'
        );

        // Publish configration if we need to customize configration instead of default one.
        $this->publishes([
            __DIR__.'/config/messages.php' => config_path('messages.php'),
        ], 'config');



        /*
        |--------------------------------------------------------------------------
        | Migrations
        |--------------------------------------------------------------------------
        */

        // You do not need to export them to the application's main database/migrations directory
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        // Publish migrations if we need to customize migrations instead of default.
        $this->publishes([
            __DIR__.'/migrations' => database_path('migrations')
        ], 'migrations');



        /*
        |--------------------------------------------------------------------------
        | Views
        |--------------------------------------------------------------------------
        */

        // The package views have not been published. Use the defaults.
        $this->loadViewsFrom(__DIR__.'/views', 'Messages');

        // Publish views if we need to customize views instead of default one.
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/messages'),
        ], 'views');




        /*
        |--------------------------------------------------------------------------
        | Translations
        |--------------------------------------------------------------------------
        */

        // Publish translations if we need to customize translations instead of default one.
        $this->publishes([
            __DIR__.'/Lang/' => resource_path('lang/vendor/messages'),
        ], 'lang');




        /*
        |--------------------------------------------------------------------------
        | Public assets
        |--------------------------------------------------------------------------
        */
        $this->publishes([
            __DIR__.'/Public' => public_path('vendor/messages'),
        ], 'public');


        /*
        |--------------------------------------------------------------------------
        | Demo languages
        |--------------------------------------------------------------------------
        */
        $languages = config('uistacks.locales');
        View::share('languages', $languages);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /*
        |--------------------------------------------------------------------------
        | Routes and controllers
        |--------------------------------------------------------------------------
        */
        include __DIR__.'/routes/web.php';
        include __DIR__.'/routes/api.php';
    }
}
