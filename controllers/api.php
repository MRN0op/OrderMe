<?php
$heading = 'API';

global $config;
require "includes/dbconnect.php";
require "includes/config.php"; // Ensure this file contains your database connection
header('Content-Type: application/json; charset=utf8');

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":
        //we need to know what he wants to get
        //
        $response = [];

        try {
            $stmt = $dbConnection->prepare("SELECT pk_delivery_agent_email, name FROM delivery_agent");
            if (!$stmt) {
                throw new Exception("Prepare statement failed: " . $dbConnection->error);
            }
        
            $stmt->execute();
            $result = $stmt->get_result();
        
            $delivery_agents = [];
            while ($row = $result->fetch_assoc()) {
                $delivery_agents[] = $row;
            }
        
            $response['status'] = 'success';
            $response['data'] = $delivery_agents;
        
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
        
        // Return the result as JSON
        echo json_encode($response);
        
        // Close the database connection
        $dbConnection->close();
        //require('views/get.view.php');

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
