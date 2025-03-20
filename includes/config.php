<?php
return [
    'db' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'dbapi',
        'port' => 3306,
    ],

    'routes' => [
        '/' => 'controllers/index.php',
        '/login' => 'controllers/login.php',
        '/register' => 'controllers/register.php',
        '/api/(\d+)' => '',
    ],
];
