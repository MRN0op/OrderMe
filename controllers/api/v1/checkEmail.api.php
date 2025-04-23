<?php
require "includes/dbconnect.php";

header("Content-Type: application/json");

$response = [];

try {
    // Check if the email parameter is provided
    if (!isset($_REQUEST['email']) || empty($_REQUEST['email'])) {
        throw new Exception("E-Mail-Parameter fehlt.");
    }

    $email = $_REQUEST['email'];

    // SQL query to check if the email exists
    $stmt = $dbConnection->prepare("SELECT COUNT(*) as count FROM branch WHERE branch_Email = ?");
    if (!$stmt) {
        throw new Exception("Prepare statement fehlgeschlagen: " . $dbConnection->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Determine response based on whether the email exists
    $response['exists'] = ($row['count'] > 0);
    $response['status'] = $response['exists'] ? 'This email is already in use' : 'Email is available';

} catch (Exception $e) {
    // On error, set exists to true
    $response['exists'] = true;
    $response['status'] = 'Enter a valid email.';
    $response['message'] = $e->getMessage();
}

// Return JSON response
echo json_encode($response);

// Close database connection
$dbConnection->close();
?>
