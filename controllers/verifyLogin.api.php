<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require "includes/dbconnect.php";   // Ensure database connection

    $branch_Email = $_POST['branch_Email'] ?? '';
    $branch_password = $_POST['branch_Password'] ?? '';
    $response = ['field' => '', 'status' => false, 'message' => '', 'email' => '']; // If Status is true that means that there is an error


    if (empty($branch_Email)) {

        $response = ['field' => '#email', 'status' => true, 'message' => 'Empty email'];
    } elseif (empty($branch_password)) {

        $response = ['field' => 'password', 'status' => true, 'message' => 'Empty password'];
    } else {
        //Database query

        $stmt = $dbConnection->prepare("SELECT pk_branch, branch_password FROM branch WHERE branch_Email = ?");
        $stmt->bind_param("s", $branch_Email);
        $stmt->execute();
        $stmt->store_result();

        // Verify if there is an User with this email
        if ($stmt->num_rows > 0) {

            $stmt->bind_result($pk_branch, $hashedPassword); // Fetch hashed Password in db
            $stmt->fetch();

            // Verify if password is correct
            if (password_verify($branch_password, $hashedPassword)) {

                $branchId = $pk_branch;
                $branchEmail = $branch_Email;
                $userType = "branch";
            } else {

                $response = ['field' => '#password', 'status' => true, 'message' => 'Incorrect Password'];
            }
        } else {

            $response = ['field' => 'email', 'status' => true, 'message' => 'No Account with this email'];
        }
    }

    // If response is true give the email back to the form
    if ($response['status'] === true) {

        echo json_encode($response);
    }
}
