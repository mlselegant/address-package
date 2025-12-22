<?php

namespace Manohar\Address;

use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Publish the SQLite database
        $this->publishes([
            __DIR__ . '/Database/address.sqlite' => database_path('address.sqlite'),
        ], 'address-database');

        // Merge package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/address.php', 'address');
    }

    public function register(): void
    {
        // Register package bindings if required
        $this->app->register(\Manohar\Address\Providers\AddressDatabaseServiceProvider::class);
    }
}
