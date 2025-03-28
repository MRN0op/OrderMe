<?php
return [
    'db' => [
        'database' => 'OrderMe',
        'port' => 3306,
    ],

    'routes' => [
        '/' => 'controllers/index.php',
        '/login' => 'controllers/login.php',
        '/signup' => 'controllers/signup.php',
        '/logout' => 'controllers/logout.php',
        '/dashboard' => 'controllers/dashboard.php',

        '/api/(\d+)' => '',
        '/api' => 'controllers/api.php',
        '/api/verifyLogin' => 'controllers/verifyLogin.api.php',
    ],
];
