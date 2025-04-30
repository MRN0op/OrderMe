<?php 
require "includes/dbconnect.php";

header('Content-Type: application/json');

$response = [];

try {
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
    $offset = ($page - 1) * $limit;

    $filterItem = isset($_GET['filter']) ? $_GET['filter'] : "All";

    // Define filter condition
    $filterCondition = "";
    if ($filterItem === 'onTime') {
        $filterCondition = "AND TIMESTAMPDIFF(MINUTE, timestamp_expected_delivery, timestamp_delivered) <= 5";
    } elseif ($filterItem === 'late') {
        $filterCondition = "AND TIMESTAMPDIFF(MINUTE, timestamp_expected_delivery, timestamp_delivered) >= 30";
    } elseif ($filterItem === 'delivered') {
        $filterCondition = "AND TIMESTAMPDIFF(MINUTE, timestamp_expected_delivery, timestamp_delivered) > 5 AND TIMESTAMPDIFF(MINUTE, timestamp_expected_delivery, timestamp_delivered) < 30";
    }

    // Get total records count for pagination
    $countSql = "SELECT COUNT(*) AS total FROM `order` WHERE status = 'delivered' $filterCondition";
    $countStmt = $dbConnection->prepare($countSql);
    $countStmt->execute();
    $countResult = $countStmt->get_result()->fetch_assoc();
    $totalRecords = (int)$countResult['total'];
    $totalPages = ceil($totalRecords / $limit);

    // Fetch filtered + paginated results
    $sql = "SELECT 
                pk_order, 
                o.fk_branch, 
                agent.name AS agent_name, 
                costumer_Name, 
                costumer_address, 
                o.status, 
                total_price, 
                timestamp_created, 
                timestamp_expected_delivery, 
                timestamp_delivered,
                TIMESTAMPDIFF(MINUTE, timestamp_expected_delivery, timestamp_delivered) AS delivery_delay
            FROM `order` AS o
            LEFT JOIN `delivery_agent` AS agent ON fk_delivery_agent_email = pk_delivery_agent_email
            WHERE o.fk_branch = 3 
              AND o.status = 'delivered'
              $filterCondition
            ORDER BY timestamp_delivered DESC
            LIMIT ? OFFSET ?";

    $stmt = $dbConnection->prepare($sql);
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $dbConnection->error);
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
