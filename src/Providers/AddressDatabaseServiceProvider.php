<?php

namespace Manohar\Address\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Manohar\Address\Models\City;
use Manohar\Address\Models\Country;
use Manohar\Address\Models\District;
use Manohar\Address\Models\Province;

class AddressDatabaseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Add a custom database connection for address package
        $this->app->booted(function () {
            $this->setupAddressDatabaseConnection();
        });
    }

    protected function setupAddressDatabaseConnection(): void
    {
        $addressDbPath = database_path('address.sqlite');

        // If the database doesn't exist in the main app, use the package version
        if (!file_exists($addressDbPath)) {
            $addressDbPath = __DIR__ . '/../Database/address.sqlite';
        }

        // Add the address database connection configuration
        Config::set('database.connections.address', [
            'driver' => 'sqlite',
            'database' => $addressDbPath,
            'prefix' => '',
            'foreign_key_constraints' => true,
        ]);

        // Set default connection for address models
        $this->setModelConnections();
    }

    protected function setModelConnections(): void
    {
        // Bind model connections
        $this->app->bind(Country::class, function () {
            $model = new Country();
            $model->setConnection('address');
            return $model;
        });

        $this->app->bind(Province::class, function () {
            $model = new Province();
            $model->setConnection('address');
            return $model;
        });

        $this->app->bind(District::class, function () {
            $model = new District();
            $model->setConnection('address');
            return $model;
        });

        $this->app->bind(City::class, function () {
            $model = new City();
            $model->setConnection('address');
            return $model;
        });
    }
}
