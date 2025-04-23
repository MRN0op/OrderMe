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
        $required_fields = ['fk_order', 'fk_menu_item'];
        $errors = [];

        foreach ($required_fields as $field) {
            if (!isset($_POST[$field])) {
                $errors[] = "$field is required.";
            }
        }

        $fk_order = $_POST['fk_order'] ?? '';
        $fk_menu_item = $_POST['fk_menu_item'] ?? '';

         // Check if fk_order exists
         $stmt = $dbConnection->prepare("SELECT pk_order FROM `order` WHERE pk_order = ?");
         $stmt->bind_param("i", $fk_order);
         $stmt->execute();
         $result = $stmt->get_result();
         if ($result->num_rows === 0) {
            $errors[] = "Order ID $fk_order does not exist.";
            throw new Exception(json_encode(["errors" => $errors]));
         }
 
         // Check if fk_menu_item exists
         $stmt = $dbConnection->prepare("SELECT pk_menu_item FROM `menu_item` WHERE pk_menu_item = ?");
         $stmt->bind_param("i", $fk_menu_item);
         $stmt->execute();
         $result = $stmt->get_result();
         if ($result->num_rows === 0) {
            $errors[] = "Menu item ID $fk_menu_item does not exist.";
            throw new Exception(json_encode(["errors" => $errors]));
         }

        if (!empty($errors)) {
            throw new Exception(json_encode(["errors" => $errors]));
        }
        
        $responses = []; // Store multiple errors
        $hasErrors = [
            'fk_order' => false,
            'fk_menu_item' => false       
        ];

        $stmt = $dbConnection->prepare("INSERT INTO `order_item` (
        fk_order, 
        fk_menu_item
    ) VALUES (?, ?)");

        // Bind parameters
        $stmt->bind_param(
            "ii", // i = integer, s = string, d = double (for DECIMAL(10,2))
            $fk_order,
            $fk_menu_item
        );
        $stmt->execute();
        $order_item_id = $stmt->insert_id;

        // Prepare response
        $response['status'] = 'success';
        $response['order_item_id'] = $order_item_id;

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