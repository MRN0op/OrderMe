<?php
require "includes/dbconnect.php";
require "includes/config.php"; // Ensure this file contains your database connection

$response = [];

try {
    // Get page number and limit from GET parameters
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
    $offset = ($page - 1) * $limit;

    // Get total records count
    $countStmt = $dbConnection->prepare("SELECT COUNT(*) AS total FROM delivery_agent");
    $countStmt->execute();
    $countResult = $countStmt->get_result()->fetch_assoc();
    $totalRecords = (int)$countResult['total'];
    $totalPages = ceil($totalRecords / $limit);

    // Fetch paginated results
    $stmt = $dbConnection->prepare("SELECT pk_delivery_agent_email, name FROM delivery_agent LIMIT ? OFFSET ?");
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . $dbConnection->error);
    }

    $stmt->bind_param("ii", $limit, $offset);
    $stmt->execute();
    $result = $stmt->get_result();

    $delivery_agents = [];
    while ($row = $result->fetch_assoc()) {
        $delivery_agents[] = $row;
    }

    // Prepare response
    $response['status'] = 'success';
    $response['data'] = $delivery_agents;
    $response['pagination'] = [
        'current_page' => $page,
        'total_pages' => $totalPages,
        'total_records' => $totalRecords,
        'limit' => $limit
    ];

} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = $e->getMessage();
}

// Return the result as JSON
echo json_encode($response);

// Close the database connection
$dbConnection->close();
?>
