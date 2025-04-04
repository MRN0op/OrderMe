<?php
return [
    'db' => [
        'host' => '172.20.0.2',
        'username' => 'root',
        'password' => 'mysecretpassword',
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
