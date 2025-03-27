<?php

$title = "Login";

//session_start(); // Start the session
require "includes/dbconnect.php"; // Ensure database connection
require "views/login.view.php"; // Ensure database connection
require "includes/config.php";

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $branch_Email = $_POST['email'] ?? '';
    $branch_password = $_POST['password'] ?? '';

    // Validate input
    if (empty($branch_Email) || empty($branch_password)) {
        $error_message = "Please fill in all fields.";
    } else {
        // Prepare query to check if email exists
        $stmt = $dbConnection->prepare("SELECT pk_branch, branch_password FROM branch WHERE branch_Email = ?");
        $stmt->bind_param("s", $branch_Email);
        $stmt->execute();
        $stmt->store_result();

        $error_message = "Succesful Login";
        // Check if user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($pk_branch, $hashedPassword);
            $stmt->fetch();

            // Verify password
           if (password_verify($branch_password, $hashedPassword)) {
            //if ($branch_password == $hashedPassword) {
                // Authentication successful - create session
                $_SESSION['branch_ID'] = $pk_branch;
                $_SESSION['branch_Email'] = $branch_Email;
                $_SESSION['user_type'] = "branch";
                header("Location: /"); // Redirect to Home
                exit;
            } else {
                $error_message = "Incorrect email or password.";
            }
        } else {
            $error_message = "Incorrect email or password.";
        }
        $stmt->close();
    }
    echo "$error_message";
}


?>