<?php
return [
    'db' => [
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'database' => 'OrderMe',
        'port' => 3306,
    ],

    'routes' => [
        '/' => 'controllers/index.php',
        '/login' => 'controllers/login.php',
        '/signup' => 'controllers/signup.php',
        '/logout' => 'controllers/logout.php',
        '/dashboard' => 'controllers/dashboard.php',
        '/api/v1/getDeliveryAgents' => 'controllers/api/v1/getDeliveryAgents.api.php',
        '/api/v1/verifyLogin' => 'controllers/api/v1/verifyLogin.api.php',

    ],
];
