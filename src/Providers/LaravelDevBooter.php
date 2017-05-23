<?php

namespace MASNathan\LaravelDev\Providers;

use PercyMamedy\LaravelDevBooter\ServiceProvider;

class LaravelDevBooter extends ServiceProvider
{
    /**
     * @inheritdoc
     */
    public function boot()
    {
        // We are on one of the Dev Environments
        if ($this->isOnADevEnvironment()) {
            // Boot dev class aliases.
            $this->bootDevAliases();
        }
    }
}
