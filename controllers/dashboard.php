<?php
$title = "Dashboard";

if (!isset($_SESSION["user_type"]) && $_SESSION["user_type"] != "branch") {
    abort(403);
}

require "includes/dbconnect.php";

$error_message = "";

try {
    // Prüfen, ob der Benutzer eingeloggt ist und zu einer Filiale gehört
    

    $fk_branch = $_SESSION["branch_ID"]; // Branch-ID aus Session holen

    // Lieferanten hinzufügen
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"] ?? null;
        $name = $_POST["name"] ?? null;

        if (!$email) {
            throw new Exception("Fehler: Email darf nicht leer sein!");
        }

        // Prüfen, ob die Email schon existiert
        $stmt_check = $dbConnection->prepare("SELECT COUNT(*) FROM delivery_agent WHERE pk_delivery_agent_email = ?");
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $stmt_check->bind_result($count);
        $stmt_check->fetch();
        $stmt_check->close();

        if ($count > 0) {
            throw new Exception("Fehler: Diese Email existiert bereits!");
        }

        // Automatisch ein Passwort generieren (8-stellig)
        $password_plain = bin2hex(random_bytes(4)); 
        $password_hash = password_hash($password_plain, PASSWORD_DEFAULT);

        // Lieferanten in die Datenbank einfügen
        $stmt = $dbConnection->prepare("INSERT INTO delivery_agent (pk_delivery_agent_email, name, fk_branch, passwort_hash, status) VALUES (?, ?, ?, ?, 'unavailable')");
        $stmt->bind_param("ssis", $email, $name, $fk_branch, $password_hash);

        if (!$stmt->execute()) {
            throw new Exception("Fehler beim Hinzufügen: " . $stmt->error);
        }

        $message = "Lieferant erfolgreich hinzugefügt!";
        $stmt->close();
    }

} catch (Exception $e) {
    $error_message = $e->getMessage();
    echo "$error_message";
}

require "views/dashboard.view.php";
?>
