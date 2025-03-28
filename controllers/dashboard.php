<?php
$title = "Dashboard";
//require "controllers/api.php";
require "includes/dbconnect.php";
require "includes/config.php"; // Ensure this file contains your database connection

// $error_message = "";

// try {
//     // Lieferanten hinzufügen
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         $email = $_POST["email"] ?? null;
//         $name = $_POST["name"] ?? null;
       

//         if (!$email) {
//             throw new Exception("Fehler: Email darf nicht leer sein!");
//         }
    

//         // Prüfen, ob die Email schon existiert
//         $stmt_check = $dbConnection->prepare("SELECT COUNT(*) FROM delivery_agent WHERE pk_delivery_agent_email = ?");
//         $stmt_check->bind_param("s", $email);
//         $stmt_check->execute();
//         $stmt_check->bind_result($count);
//         $stmt_check->fetch();
//         $stmt_check->close();

//         if ($count > 0) {
//             throw new Exception("Fehler: Diese Email existiert bereits!");
//         }

//         // Automatisch ein Passwort generieren (8-stellig)
//         $password_plain = bin2hex(random_bytes(4)); 
//         $password_hash = password_hash($password_plain, PASSWORD_DEFAULT);

//         // Lieferanten in die Datenbank einfügen
//         $stmt = $dbConnection->prepare("INSERT INTO delivery_agent (pk_delivery_agent_email, name, passwort_hash, status) VALUES (?, ?, ?, 'unavailable')");
//         $stmt->bind_param("sss", $email, $name, $password_hash);

//         if (!$stmt->execute()) {
//             throw new Exception("Fehler beim Hinzufügen: " . $stmt->error);
//         }

//         $message = "Lieferant erfolgreich hinzugefügt!";
//         $stmt->close();
//     }

//     // Bestehende Lieferanten abrufen
//     $stmt = $dbConnection->prepare("SELECT pk_delivery_agent_email, name  FROM delivery_agent");
//     $stmt->execute();
//     $result = $stmt->get_result();

//     $delivery_agents = [];
//     while ($row = $result->fetch_assoc()) {
//         $delivery_agents[] = $row;
//     }

//     $stmt->close();
//     $dbConnection->close();

// } catch (Exception $e) {
//     $error_message = $e->getMessage();
//     echo "$error_message";
// }




// Define the API URL
//$apiUrl = 'http://webap.test/api/#/?what=agents'; // Change this to your actual API URL
$apiUrl = 'http://webap.test/api'; // Change this to your actual API URL

// Initialize a cURL session
$ch = curl_init($apiUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);
echo "$response";
// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    exit;
}

// Close the cURL session
curl_close($ch);

// Decode the JSON response
$delivery_agents = json_decode($response, true);
//echo "$delivery_agents";
?>


<!-- // <?php if (isset($delivery_agents['status']) && $delivery_agents['status'] === 'success'): ?>
//     <?php foreach ($delivery_agents['data'] as $agent): ?>
//         <div class="agent">
//             <strong>Email:</strong> <?php echo htmlspecialchars($agent['pk_delivery_agent_email']); ?><br>
//             <strong>Name:</strong> <?php echo htmlspecialchars($agent['name']); ?><br>
//            <strong>Branch:</strong> <?php echo htmlspecialchars($agent['fk_branch']); ?><br>
//         </div>
//     <?php endforeach; ?>
// <?php else: ?>
//     <p>No delivery agents found or an error occurred.</p>
// <?php endif; ?> -->




<?php
// View einbinden
require "views/dashboard.view.php";


// Liste Bestellungen 
// liste Lieferanten
// function passwort generieren damit das passwort an den user geschickt wird.
// function Email scheken 
?>



