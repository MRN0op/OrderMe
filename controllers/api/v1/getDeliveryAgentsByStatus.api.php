<?php
require "includes/dbconnect.php";

$response = [];

try {
    // Get restaurant_id from GET parameter
    if (!isset($_SESSION['branch_ID'])) {
        throw new Exception("Restaurant ID not provided.");
    }
    $restaurantId = (int) $_SESSION['branch_ID'];
    // status must be '' delimited string $status="'available'"
    $status = "";
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        }
    // Get page number and limit from GET parameters
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 6;
    $offset = ($page - 1) * $limit;

    // Get total records count for the specific restaurant (all statuses)
    $text = "SELECT COUNT(*) AS total FROM delivery_agent WHERE fk_branch = ? ";
    if ($status != "") 
    { 
        $text = $text . " AND status = $status";
    }

    $countStmt = $dbConnection->prepare(
        $text
    );
    $countStmt->bind_param("i", $restaurantId);
    $countStmt->execute();
    $countResult = $countStmt->get_result()->fetch_assoc();
    $totalRecords = (int) $countResult['total'];
    $totalPages = ceil($totalRecords / $limit);

    $text2 = "SELECT pk_delivery_agent_email, name, current_location, status 
              FROM delivery_agent WHERE fk_branch = ? ";
              
              
    if ($status != ""){
        $text2 = $text2 . " AND status = $status";
        
    }
    $text2 = $text2 . " LIMIT ? OFFSET ?";
    // Fetch paginated results for the specific restaurant (all statuses)
    $stmt = $dbConnection->prepare(
        $text2
    );
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . $dbConnection->error);
    }

    $stmt->bind_param("iii", $restaurantId, $limit, $offset);
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
