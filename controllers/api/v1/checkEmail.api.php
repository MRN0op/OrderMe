<?php
require "includes/dbconnect.php";
require "includes/config.php"; // Stellt sicher, dass die DB-Verbindung funktioniert

header("Content-Type: application/json");

$response = [];

try {
    // Prüfen, ob eine E-Mail als GET- oder POST-Parameter gesendet wurde
    if (!isset($_REQUEST['email']) || empty($_REQUEST['email'])) {
        throw new Exception("E-Mail-Parameter fehlt.");
    }

    $email = $_REQUEST['email'];

    // SQL-Abfrage, um zu prüfen, ob die E-Mail bereits von einem Restaurant verwendet wird
    $stmt = $dbConnection->prepare("SELECT COUNT(*) as count FROM branch WHERE branch_Email = ?");
    if (!$stmt) {
        throw new Exception("Prepare statement fehlgeschlagen: " . $dbConnection->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Wenn count > 0, existiert die E-Mail bereits
    $response['exists'] = ($row['count'] > 0) ? true : false;
    $response['status'] = 'success';

} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = $e->getMessage();
}

// JSON-Ausgabe
echo json_encode($response);

// DB-Verbindung schließen
$dbConnection->close();
?>
