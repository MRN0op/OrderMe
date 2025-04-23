<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require "includes/dbconnect.php"; // Ensure database connection

    $branch_Email = $_POST['branch_Email'] ?? '';
    $branch_password = $_POST['branch_Password'] ?? '';
    $responses = []; // Store multiple errors
    $hasErrors = [
                    'email' => false,
                    'password' => false,
                ];

    if (empty($branch_Email)) {
        $responses[] = ['field' => '#email', 'status' => true, 'messageField' => '.emailError', 'message' => 'Empty email'];
        $hasErrors['email'] = true;
    } else {
        $responses[] = ['field' => '#email', 'status' => false, 'messageField' => '.emailError', 'message' => ''];
    }
    
    if (empty($branch_password)) { // Separate check for password
        $responses[] = ['field' => '#password', 'status' => true, 'messageField' => '.passwordError', 'message' => 'Empty password'];
        $hasErrors['password'] = true;
    } else {
        $responses[] = ['field' => '#password', 'status' => false, 'messageField' => '.passwordError', 'message' => ''];
    }

    if (!$hasErrors['email'] || !$hasErrors['password']) { // Only check DB if no validation errors
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
                $responses[] = ['field' => '#password', 'status' => false, 'messageField' => '.passwordError', 'message' => ''];
                exit;
            } else {
                $responses[] = ['field' => '#password', 'status' => true, 'messageField' => '.passwordError', 'message' => 'Incorrect password'];
                $hasErrors['password'] = true;
            }

            $responses[] = ['field' => '#email', 'status' => false, 'messageField' => '.emailError', 'message' => ''];

        } else {
            $responses[] = ['field' => '#email', 'status' => true, 'messageField' => '.emailError', 'message' => 'No account with this email'];
            $hasErrors['email'] = true;
        }
    }

    // Return errors if any exist
    header('Content-Type: application/json');
    echo json_encode(['errors' => $responses]);
    exit;
}
