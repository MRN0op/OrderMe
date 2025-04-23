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
        '/signup' => 'controllers/signup.php',
        '/logout' => 'controllers/logout.php',
        '/dashboard' => 'controllers/dashboard.php',
        '/api/v1/getDeliveryAgents' => 'controllers/api/v1/getDeliveryAgents.api.php',
        '/api/v1/verifyLogin' => 'controllers/api/v1/verifyLogin.api.php',
        '/api/v1/checkEmail' => 'controllers/api/v1/checkEmail.api.php',
    ],
];
