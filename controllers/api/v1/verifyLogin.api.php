<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require "includes/dbconnect.php"; // Ensure database connection

    $branch_Email = $_POST['branch_Email'] ?? '';
    $branch_password = $_POST['branch_Password'] ?? '';
    $errors = []; // Store multiple errors

    if (empty($branch_Email)) {
        $errors[] = ['field' => '#email', 'status' => true, 'messageField' => '.emailError', 'message' => 'Empty email'];
    } 
    if (empty($branch_password)) { // Separate check for password
        $errors[] = ['field' => '#password', 'status' => true, 'messageField' => '.passwordError', 'message' => 'Empty password'];
    } 

    if (empty($errors)) { // Only check DB if no validation errors
        $stmt = $dbConnection->prepare("SELECT pk_branch, branch_password FROM branch WHERE branch_Email = ?");
        $stmt->bind_param("s", $branch_Email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($pk_branch, $hashedPassword);
            $stmt->fetch();

            if (password_verify($branch_password, $hashedPassword)) {
                echo json_encode([
                    'status' => true,
                    'message' => 'Login successful',
                    'email' => $branch_Email,
                    'redirect' => '/dashboard'
                ]);
                $_SESSION['branch_ID'] = $pk_branch;
                $_SESSION['branch_Email'] = $branch_Email;
                $_SESSION['user_type'] = "branch";
                exit;
            } else {
                $errors[] = ['field' => '#password', 'status' => true, 'messageField' => '.passwordError', 'message' => 'Incorrect password'];
            }
        } else {
            $errors[] = ['field' => '#email', 'status' => true, 'messageField' => '.emailError', 'message' => 'No account with this email'];
        }
    }

    // Return errors if any exist
    header('Content-Type: application/json');
    echo json_encode(['errors' => $errors]);
    exit;
}
