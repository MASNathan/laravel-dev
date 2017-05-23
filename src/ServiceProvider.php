<?php

namespace MASNathan\LaravelDev;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use MASNathan\LaravelDev\Providers\LaravelDevBooter;
use MASNathan\LaravelDev\Providers\LaravelIdeHelper;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig('laravel-dev');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfig('laravel-dev');

        config()->set('dev-booter', config('laravel-dev.dev-booter'));
        config()->set('ide-helper', config('laravel-dev.ide-helper'));

        $this->registerProviders(config('laravel-dev.use'));
    }

    protected function publishConfig($configFileName)
    {
        $configPath = __DIR__ . '/../config/' . $configFileName . '.php';
        if (function_exists('config_path')) {
            $publishPath = config_path($configFileName . '.php');
        } else {
            $publishPath = base_path('config/' . $configFileName . '.php');
        }

        $this->publishes([$configPath => $publishPath], 'config');
    }

    protected function mergeConfig($configFileName)
    {
        $configPath = __DIR__ . '/../config/' . $configFileName . '.php';
        $this->mergeConfigFrom($configPath, $configFileName);
    }

    protected function registerProviders($providersToUse)
    {
        if (in_array('dev-booter', $providersToUse)) {
            $this->app->register(LaravelDevBooter::class);
        }

        if (in_array('laravel-ide-helper', $providersToUse)) {
            $this->app->register(LaravelIdeHelper::class);
        }

        if (in_array('laravel-view-generator', $providersToUse)) {
            $this->app->register(\MaddHatter\ViewGenerator\ServiceProvider::class);
        }

        if (in_array('interactive-make', $providersToUse)) {
            $this->app->register(\Laracademy\Commands\MakeServiceProvider::class);
        }
    }
}
