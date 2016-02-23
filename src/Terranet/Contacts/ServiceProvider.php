<?php

namespace Terranet\Contacts;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $baseDir = realpath(__DIR__ . '/../../../');
        $local = "{$baseDir}/publishes/routes.php";
        $routes = app_path('Http/Terranet/Contacts/routes.php');

        if (! $this->app->routesAreCached()) {
            if (file_exists($routes)) {
                /** @noinspection PhpIncludeInspection */
                require_once $routes;
            } else {
                /** @noinspection PhpIncludeInspection */
                require_once $local;
            }
        }

        // routes
        $this->publishes([$local => $routes], 'routes');

        // resources
        $this->publishes(["{$baseDir}/publishes/views" => base_path('resources/views/vendor/contacts')], 'views');
        $this->loadViewsFrom("{$baseDir}/publishes/views", 'contacts');

        /*
         * Publish & Load configuration
         */
        $this->publishes(["{$baseDir}/publishes/config.php" => config_path('contacts.php')], 'config');
        $this->mergeConfigFrom("{$baseDir}/publishes/config.php", 'contacts');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }
}