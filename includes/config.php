<?php
return [
    'db' => [
<<<<<<< HEAD
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
=======
>>>>>>> 44f31d9703f5c42fd686e5b1b5e4e5a7ad6bcc67
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

<<<<<<< HEAD
=======
        '/api/(\d+)' => '',
        '/api' => 'controllers/api.php',
        '/api/verifyLogin' => 'controllers/verifyLogin.api.php',
>>>>>>> 44f31d9703f5c42fd686e5b1b5e4e5a7ad6bcc67
    ],
];
