<?php
require "includes/dbconnect.php";
require "views/register.view.php";
require "includes/config.php"; // Ensure this file contains your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure $pdo is defined before using it
    $error_message = "Successful registration";

    $branch_Name = $_POST['branch_Name'] ?? '';
    $branch_Address = $_POST['branch_Address'] ?? '';
    $branch_TelefonNumber = $_POST['branch_TelefonNumber'] ?? '';
    $branch_Email = $_POST['branch_Email'] ?? '';
    $branch_Password = $_POST['branch_Password'] ?? '';

    try {
        // Check if the email address already exists
        $stmt_check = $dbConnection->prepare("SELECT COUNT(*) FROM branch WHERE branch_Email = ?");
        $stmt_check->bind_param("s", $branch_Email); // Bind the parameter
        $stmt_check->execute();
        $stmt_check->bind_result($emailExists);
        $stmt_check->fetch();
        $stmt_check->close();

        if ($emailExists) {
            $error_message = "The email address is already in use.";
        } else {
            // Hash the password before inserting into the database
            $hashedPassword = password_hash($branch_Password, PASSWORD_DEFAULT);

            // Insert user into the database with hashed password
            $stmt = $dbConnection->prepare("INSERT INTO branch (branch_Name, branch_Address, branch_TelefonNumber, branch_Email, branch_Password) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $branch_Name, $branch_Address, $branch_TelefonNumber, $branch_Email, $hashedPassword);
            $stmt->execute();
            $stmt->close();

            // Redirect after successful registration (you can uncomment this when ready)
            // header("Location: success.php");
            // exit;
        }
    } catch (Exception $e) {
        $error_message = "Error during registration: " . $e->getMessage();

    }
    echo "$error_message";
}

?>
