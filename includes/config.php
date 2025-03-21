<?php
return [
    'db' => [
        'host' => 'localhost',
        'username' => 'OrderMe',
        'password' => '',
        'database' => 'OrderMe',
        'port' => 3306,
    ],

    'routes' => [
        '/' => 'controllers/index.php',
        '/login' => 'controllers/login.php',
        '/register' => 'controllers/register.php',
        '/logout' => 'controllers/logout.php',

        '/api/(\d+)' => '',
    ],
];
