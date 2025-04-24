<?php
require "includes/dbconnect.php";

header('Content-Type: application/json'); // Set JSON header

$response = [];

try {
    if (!isset($_SESSION['branch_ID'])) {
        throw new Exception("Restaurant ID not provided.");
    }
    $restaurantId = (int) $_SESSION['branch_ID'];

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
    $offset = ($page - 1) * $limit;

    $countStmt = $dbConnection->prepare("SELECT COUNT(*) AS total FROM `order` WHERE status IN ('pending', 'accepted', 'underway')");
    if (!$countStmt) {
        throw new Exception("Prepare count statement failed: " . $dbConnection->error);
    }

    $countStmt->execute();
    $countResult = $countStmt->get_result()->fetch_assoc();
    $totalRecords = (int)$countResult['total'];
    $totalPages = ceil($totalRecords / $limit);

    $stmt = $dbConnection->prepare("SELECT pk_order, fk_branch, fk_delivery_agent_email, costumer_Name, costumer_address, status, total_price, timestamp_created, timestamp_expected_delivery FROM `order` WHERE fk_branch = ? AND status IN ('pending', 'accepted', 'underway') LIMIT ? OFFSET ?");
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . $dbConnection->error);
    }

    $stmt->bind_param("iii", $restaurantId, $limit, $offset);
    $stmt->execute();
    $result = $stmt->get_result();

    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }

    $response['status'] = 'success';
    $response['data'] = $orders;
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

echo json_encode($response);
$dbConnection->close();
