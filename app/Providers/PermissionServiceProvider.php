<?php

namespace App\Providers;

use App\Models\Permissions;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermisionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Permissions::all()->map(function ($permision){
            Gate::define($permision->name, function ($user) use ($permision){
                return $user->hasPermision($permision->name);
            });
        });
    }
}
