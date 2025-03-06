<?php
$config = require('config.php');

$dbConfig = $config['db'];

try {
    // Create a new MySQLi connection
    $dbConnection = new mysqli(
        $dbConfig['host'],
        $dbConfig['username'],
        $dbConfig['password'],
        $dbConfig['database'],
        $dbConfig['port']
    );

    // Check for connection errors
    if ($dbConnection->connect_error) {
        throw new Exception("Database connection failed: " . $dbConnection->connect_error);
    }
} catch (Exception $e) {
    // Handle the error (log it, display an error message, etc.)
    die("Error: " . $e->getMessage());
}
?>
