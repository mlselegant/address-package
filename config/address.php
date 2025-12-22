<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Address Database Configuration
    | Created by Manohar Lal Shrestha
    |--------------------------------------------------------------------------
    |
    | This configuration allows you to customize the address database connection.
    |
    */

    'database' => [
        'connection' => 'address',
        'path' => database_path('address.sqlite'),
    ],

    'publish' => [
        'database' => true,
    ],
];
