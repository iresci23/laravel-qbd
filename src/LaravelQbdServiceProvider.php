<?php
namespace Iresci23\LaravelQbd;

use Illuminate\Support\ServiceProvider;

class LaravelQbdServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $this->publishes([
            __DIR__.'/Config/quickbooks.php' => config_path('quickbooks.php'),
        ], 'config');

        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(
            __DIR__.'/Config/quickbooks.php', 'quickbooks'
        );

        $this->mergeConfigFrom(
            __DIR__.'/Config/maps.php', 'quickbooks'
        );

        $this->app->make('Iresci23\LaravelQbd\LaravelQbdController');

        $this->loadViewsFrom(__DIR__.'/Views', 'qbd');
    }
}
