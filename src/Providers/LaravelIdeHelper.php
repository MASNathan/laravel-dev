<?php

namespace MASNathan\LaravelDev\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;

class LaravelIdeHelper extends IdeHelperServiceProvider
{
    /**
     * @inheritdoc
     */
    public function boot()
    {
        $viewPath = __DIR__.'/../resources/views';
        $this->loadViewsFrom($viewPath, 'ide-helper');
    }
}
