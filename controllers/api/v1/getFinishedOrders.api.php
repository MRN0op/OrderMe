<?php
require "includes/dbconnect.php";

header('Content-Type: application/json'); // Set JSON header

$response = [];

try {

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
    $offset = ($page - 1) * $limit;

    // Gesamtanzahl der abgeschlossenen Bestellungen abrufen
    $countStmt = $dbConnection->prepare("SELECT COUNT(*) AS total FROM `order` WHERE status = 'finished'");
    $countStmt->execute();
    $countResult = $countStmt->get_result()->fetch_assoc();
    $totalRecords = (int)$countResult['total'];
    $totalPages = ceil($totalRecords / $limit);

    // Paginierte "finished" Orders abrufen
    $stmt = $dbConnection->prepare("SELECT pk_order, o.fk_branch, agent.name, costumer_Name, costumer_address, o.status, total_price, timestamp_created, timestamp_expected_delivery, timestamp_delivered FROM `order` AS o LEFT JOIN `delivery_agent` AS agent ON fk_delivery_agent_email = pk_delivery_agent_email WHERE o.fk_branch = 3 AND o.status = 'delivered' LIMIT ? OFFSET ?");
    if (!$stmt) {
        throw new Exception("Prepare statement fehlgeschlagen: " . $dbConnection->error);
    }

    $stmt->bind_param("ii", $limit, $offset);
    $stmt->execute();
    $result = $stmt->get_result();

    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }

    // Antwort vorbereiten
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

// JSON-Ausgabe
echo json_encode($response);

// DB-Verbindung schließen
$dbConnection->close();
?>
