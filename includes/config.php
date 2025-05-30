<?php
return [
    'db' => [

        'host' => '127.0.0.1',
        'username' => 'OrderMe',
        'password' => 'test',
        'database' => 'orderme',
        'port' => 3306,
    ],

    'routes' => [
        '/' => 'controllers/index.php',
        '/login' => 'controllers/login.php',
        '/signup' => 'controllers/signup.php',
        '/logout' => 'controllers/logout.php',
        '/dashboard' => 'controllers/dashboard.php',
        '/route' => 'controllers/route.php',
        '/api/v1/getDeliveryAgents' => 'controllers/api/v1/getDeliveryAgents.api.php',
        '/api/v1/verifyLogin' => 'controllers/api/v1/verifyLogin.api.php',
        '/api/v1/checkEmail' => 'controllers/api/v1/checkEmail.api.php',
        '/api/v1/getUnfinishedOrders' => 'controllers/api/v1/getUnfinishedOrders.api.php',
        '/api/v1/getFinishedOrders' => 'controllers/api/v1/getFinishedOrders.api.php',
        '/api/v1/getAvailableDeliveryAgents' => 'controllers/api/v1/getAvailableDeliveryAgents.api.php'
    ],
];
