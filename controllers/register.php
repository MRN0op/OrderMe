<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $branch_Name = $_POST['branch_Name'];
    $branch_Address = $_POST['branch_Address'];
    $branch_TelefonNumer = $_POST['branch_TelefonNumber'];
    $branch_Email = $_POST['branch_Email'];
    $branch_Password = $_POST['branch_Password'];

try {
        // Check if the email address already exists
        $stmt_check = $pdo->prepare("SELECT COUNT(*) FROM branch WHERE branch_Email = ?");
        $stmt_check->execute([$branch_Email]);
        $emailExists = $stmt_check->fetchColumn();

        if ($emailExists) {
            $error_message = "The email address is already in use.";
        } else {
            // Insert user into the database
            $stmt = $pdo->prepare("INSERT INTO branch (branch_Name, branch_Address, branch_TelefonNumber, branch_Email, branch_Password) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$branch_Email, $branch_Address, $branch_Name, $branch_TelefonNumer, $branch_Password]);
            exit;
        }
    } catch (PDOException $e) {
        $error_message = "Error during registration: " . $e->getMessage();
    }
}













require "views/register.view.php";
?>

