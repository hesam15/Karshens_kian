<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kavenegar\KavenegarApi;

class AliasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();

        $loader->alias('Kavenegar', KavenegarApi::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
