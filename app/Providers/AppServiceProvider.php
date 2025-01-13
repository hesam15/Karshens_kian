<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Mpdf\Tag\B;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('permision', function ($permission) {
            return "<?php if (auth()->user()->role->permissions->contains('name', $permission)) : ?>";
        });

        Blade::directive('endpermision', function () {
            return "<?php endif; ?>";
        });
    }
}
