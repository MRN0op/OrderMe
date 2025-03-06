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
        '/api' => 'controllers/api.php',
        '/api/(\d+)' => '',
    ],
];
