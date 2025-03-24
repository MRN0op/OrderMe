<?php
$title = "Sign up";

require "includes/dbconnect.php";
require "includes/config.php"; // Ensure this file contains your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure $pdo is defined before using it
    $error_message = "Successful registration";

    $branch_Name = $_POST['name'] ?? '';
    $branch_Address = $_POST['address'] ?? '';
    $branch_phoneNumber = $_POST['phoneNumber'] ?? '';
    $branch_prefix = $_POST['prefix'] ?? '';
    $branch_Email = $_POST['email'] ?? '';
    $branch_Password = $_POST['password'] ?? '';

    if (strlen($branch_Name) < 2) {
        exit;
    }

    // Validate Address (At least 6 characters)
    if (strlen($branch_Address) < 6) {
        exit;
    }

    // Validate Phone Number (Only digits allowed)
    if (!preg_match('/^\d+$/', $branch_phoneNumber)) {
        exit;
    }

    // Validate Email Format
    if (!filter_var($branch_Email, FILTER_VALIDATE_EMAIL)) {
        exit;
    }

    // Validate Password (At least 8 characters and 1 special character)
    if (strlen($branch_Password) < 8 || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $branch_Password)) {
        exit;
    }

    // Validate Password Confirmation
    if ($branch_Password !== $branch_ConfirmPassword) {
        exit;
    }



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
            $stmt->bind_param("sssss", $branch_Name, $branch_Address, $branch_phoneNumber, $branch_Email, $hashedPassword);
            $stmt->execute();
            $stmt->close();

            // Redirect after successful registration (you can uncomment this when ready)
            // header("Location: success.php");
            // exit;

            header("Location: /login");
        }
    } catch (Exception $e) {
        $error_message = "Error during registration: " . $e->getMessage();
    }
    echo "$error_message";
}

require "views/signup.view.php";
