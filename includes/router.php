<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$config = require('config.php');

$routes = $config['routes'];

function routeToController($_uri, $_routes){
    foreach ($_routes as $routePattern => $controller) {
        if (preg_match("~^$routePattern$~", $_uri, $matches)) {
            // Capture dynamic parameters (like nodeId or plantId)
            if (isset($matches[1])) {
                $_GET['id'] = $matches[1]; // Capture dynamic ID in $_GET['id']
            }
            require $controller;
            return;
        }
    }
    abort();
}

function abort($_code = 404){
    http_response_code($_code);
    require "views/$_code.php";
    die();
}

routeToController($uri, $routes);


/*
               /      \
            \  \  ,,  /  /
             '-.`\()/`.-'
            .--_'(  )'_--.
           / /` /`""`\ `\ \
            |  |  ><  |  |
            \  \      /  /
    Loris G.	'.__.'
*/

?>