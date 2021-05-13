<?php

namespace EvolutionCMS\Example;

use EvolutionCMS\ServiceProvider;

class ExampleServiceProvider extends ServiceProvider
{
    protected $namespace = 'example';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->registerRoutingModule(
            'Example module',
            __DIR__ . '/../routes.php'
        );

        $this->publishes([
            __DIR__ . '/../publishable/assets'  => MODX_BASE_PATH . 'assets',
            __DIR__ . '/../publishable/seeders' => EVO_CORE_PATH . 'database/seeders',
        ]);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', $this->namespace);
        $this->loadTranslationsFrom(__DIR__ . '/../lang', $this->namespace);
        $this->loadMigrationsFrom(__DIR__ . '/../resources/migrations');
    }
}
