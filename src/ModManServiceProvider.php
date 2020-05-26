<?php

namespace enesyurtlu\ModMan;

use Illuminate\Support\ServiceProvider;

class ModManServiceProvider extends ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/modman.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('modman.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'modman'
        );

        $this->app->bind('ModMan', function ($app) {
            return new ModMan($app);
        });
        //$this->app->register(ConsoleServiceProvider::class);
    }
}
