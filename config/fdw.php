<?php

return [

    'auth' => [
        'module'   => 'auth',
        'host'     => env('FDW_AUTH_HOST', '127.0.0.1'),
        'port'     => env('FDW_AUTH_PORT', '5432'),
        'database' => env('FDW_AUTH_DATABASE', 'ses.auth'),
        'user'     => env('FDW_AUTH_USERNAME', 'postgres'),
        'password' => env('FDW_AUTH_PASSWORD', 'postgres'),
    ],

];
