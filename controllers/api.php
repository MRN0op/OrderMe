<?php
$heading = 'API';

global $config;

header('Content-Type: application/json; charset=utf8');

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":

        require('views/get.view.php');
        break;

    case "POST":

        require('views/post.view.php');
        break;

    case "PUT":

        require('views/put.view.php');
        break;

    case "DELETE":

        require('views/delete.view.php');
        break;

    default:
        echo "Hello";
}
