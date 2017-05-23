# Laravel 5 Development Bundle

## Install

This package is meant to be used on development only.

Require this package with composer using the following command:
```bash
composer require barryvdh/laravel-ide-helper --dev
```
In Laravel, instead of adding the service provider in the `config/app.php` file, you can add the 
following code to your `app/Providers/AppServiceProvider.php` file, within the `register()` method:
```php
public function register()
{
    if ($this->app->environment() !== 'production') {
        $this->app->register(\MASNathan\LaravelDev\ServiceProvider::class);
    }
    // ...
}
```
This will allow your application to load the Laravel IDE Helper on non-production environments.

That's it!

Now you have the following packages up and running:

* [percymamedy/laravel-dev-booter](https://github.com/percymamedy/laravel-dev-booter)
* [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)
* [maddhatter/laravel-view-generator](https://github.com/maddhatter/laravel-view-generator)
* [laracademy/interactive-make](https://github.com/laracademy/interactive-make)