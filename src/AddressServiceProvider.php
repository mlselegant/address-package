<?php

namespace Manohar\Address;

use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Load migrations from package (so php artisan migrate picks them up)
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Optional: load views, translations, routes if you add them:
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'tw-address');
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tw-address');

        // Publish command(s) if needed — example to publish migrations or config
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations/address'),
        ], 'address-migrations');

        $this->publishes([
            __DIR__.'/../database/seeders' => database_path('seeders/address'),
        ], 'address-seeders');
    }

    public function register(): void
    {
        // Register package bindings if required
    }
}
