<?php
require "includes/dbconnect.php";
require "includes/config.php"; 

$response = [];

try {
    
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
    $offset = ($page - 1) * $limit;

    
    $countStmt = $dbConnection->prepare("SELECT COUNT(*) AS total FROM `order`");
    $countStmt->execute();
    $countResult = $countStmt->get_result()->fetch_assoc();
    $totalRecords = (int)$countResult['total'];
    $totalPages = ceil($totalRecords / $limit);

    
    $stmt = $dbConnection->prepare("SELECT pk_order, fk_branch, fk_delivery_agent_email, costumer_Name, costumer_address, status, total_price, timestamp_created, timestamp_expected_delivery FROM `order` LIMIT ? OFFSET ?");
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . $dbConnection->error);
    }

    $stmt->bind_param("ii", $limit, $offset);
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
?>
