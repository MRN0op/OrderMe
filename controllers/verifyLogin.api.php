<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require "includes/dbconnect.php"; // Ensure database connection

    $branch_Email = $_POST['branch_Email'] ?? '';
    $branch_password = $_POST['branch_Password'] ?? '';
    $response = ['field' => '', 'status' => false, 'message' => '', 'email' => '']; // Default response

    if (empty($branch_Email)) {
        $response = ['field' => '#email', 'status' => true, 'messageField' => '.emailError', 'message' => 'Empty email'];
    } elseif (empty($branch_password)) {
        $response = ['field' => '#password', 'status' => true, 'messageField' => '.passwordError', 'message' => 'Empty password'];
    } else {
        // Database query
        $stmt = $dbConnection->prepare("SELECT pk_branch, branch_password FROM branch WHERE branch_Email = ?");
        $stmt->bind_param("s", $branch_Email);
        $stmt->execute();
        $stmt->store_result();

        // Verify if there is a user with this email
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($pk_branch, $hashedPassword); // Fetch hashed password in db
            $stmt->fetch();

            // Verify if password is correct
            if (password_verify($branch_password, $hashedPassword)) {
                $response = [
                    'status' => false,
                    'message' => 'Login successful',
                    'email' => $branch_Email,
                    'redirect' => '/dashboard' // Example redirect URL
                ];
            } else {
                $response = ['field' => '#password', 'status' => true, 'messageField' => '.passwordError', 'message' => 'Incorrect password'];
            }
        } else {
            $response = ['field' => '#email', 'status' => true,'messageField' => '.emailError', 'message' => 'No account with this email'];
        }
    }

    // Always return JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
