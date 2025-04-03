<?php

require "includes/dbconnect.php";

$userType = $_SESSION['user_type'] ?? null;
$fk_branch = $_SESSION["branch_ID"]; // Branch-ID aus Session holen

// if (!$userType && $userType != "branch") {
//     abort(403);
//     exit;
// }

$response = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {

       

        // Validierung der Eingaben
        $required_fields = ['fk_branch', 'costumer_Name', 'costumer_address', 'status', 'total_price'];
        $valid_statuses = ['pending', 'accepted'];
        $errors = [];

        foreach ($required_fields as $field) {
            if (!isset($_POST[$field])) {
                $errors[] = "$field is required.";
            }
        }

        if (isset($_POST['status']) && !in_array($_POST['status'], $valid_statuses)) {
            $errors[] = "Invalid status value.";
        }

        if (isset($_POST['total_price']) && (!is_numeric($_POST['total_price']) || $_POST['total_price'] <= 0)) {
            $errors[] = "Total price must be a positive number.";
        }

        if (isset($_POST['timestamp_expected_delivery'])) {
            $expected_delivery = strtotime($_POST['timestamp_expected_delivery']);
            if (!$expected_delivery || $expected_delivery < time()) {
                $errors[] = "Expected delivery time cannot be in the past.";
            }
        }

        if (!empty($errors)) {
            throw new Exception(json_encode(["errors" => $errors]));
        }

        $fk_branch = $_POST['fk_branch'] ?? '';
        $costumer_Name = $_POST['costumer_Name'] ?? '';
        $costumer_address = $_POST['costumer_address'] ?? '';
        $status = $_POST['status'] ?? '';
        $total_price = $_POST['total_price'] ?? '';
        $status = $_POST['status'] ?? '';
        //optional parms
        $timestamp_expected_delivery = isset($_POST['timestamp_expected_delivery']) ? (string) $_POST['timestamp_expected_delivery'] : "null";
        $fk_delivery_agent_email = isset($_POST['fk_delivery_agent_email']) ? (string) $_POST['fk_delivery_agent_email'] : "null";

        $responses = []; // Store multiple errors
        $hasErrors = [
            'fk_branch' => false,
            'costumer_Name' => false,
            'costumer_address' => false,
            'status' => false,
            'total_price' => false,
            'fk_delivery_agent_emai' => false,
            'timestamp_expected_delivery' => false

        ];

        $stmt = $dbConnection->prepare("INSERT INTO `order` (
        fk_branch, 
        fk_delivery_agent_email, 
        costumer_Name, 
        costumer_address, 
        status, 
        total_price, 
        timestamp_expected_delivery, 
        timestamp_created,
        timestamp_delivered
    ) VALUES (?, ?, ?, ?, ?, ?, ?,NOW(),?)");

        // Ensure total_price is a float to properly handle DECIMAL(10,2)
        $total_price = number_format((float) $total_price, 2, '.', '');

        // Bind parameters
        $stmt->bind_param(
            "issssdss", // i = integer, s = string, d = double (for DECIMAL(10,2))
            $fk_branch,
            $fk_delivery_agent_email,
            $costumer_Name,
            $costumer_address,
            $status,
            $total_price, // DECIMAL(10,2) handled as double
            $timestamp_expected_delivery,
            $timestamp_delivered
        );
        $stmt->execute();
        $order_id = $stmt->insert_id;

        // Prepare response
        $response['status'] = 'success';
        $response['order_id'] = $order_id;

    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }

    // Close the database connection
    $dbConnection->close();

    // Return the result as JSON
    echo json_encode($response);



}
?>