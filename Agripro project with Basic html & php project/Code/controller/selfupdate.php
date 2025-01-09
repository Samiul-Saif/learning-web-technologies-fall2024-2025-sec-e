<?php
session_start();
require_once('../model/user.php');

if (isset($_REQUEST['submit'])) {
    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);
    $email = trim($_REQUEST['email']);

    // Simple validation
    if (empty($username) || empty($password) || empty($email)) {
        echo "All fields are required (username, password, email).";
    } elseif (strpos($email, '@') === false || strpos($email, '.') === false) {
        echo "Invalid email format. An email must contain '@' and a domain like '.com'.";
    } elseif (strlen($username) < 3) {
        echo "Username must be at least 3 characters long.";
    } else {
        // Password validation
        $has_uppercase = false;
        $has_lowercase = false;
        $has_number = false;
        $has_special_char = false;

        // Check each character in the password
        for ($i = 0; $i < strlen($password); $i++) {
            $char = $password[$i];
            if ($char >= 'A' && $char <= 'Z') {
                $has_uppercase = true;
            } elseif ($char >= 'a' && $char <= 'z') {
                $has_lowercase = true;
            } elseif ($char >= '0' && $char <= '9') {
                $has_number = true;
            } else {
                // Special character check: If the character is not a letter or a number, it's a special character
                if (!($char >= 'A' && $char <= 'Z') && !($char >= 'a' && $char <= 'z') && !($char >= '0' && $char <= '9')) {
                    $has_special_char = true;
                }
            }
        }

        if (strlen($password) < 8) {
            echo "Password must be at least 8 characters long.";
        } elseif (!$has_uppercase) {
            echo "Password must include at least one uppercase letter.";
        } elseif (!$has_lowercase) {
            echo "Password must include at least one lowercase letter.";
        } elseif (!$has_number) {
            echo "Password must include at least one number.";
        } elseif (!$has_special_char) {
            echo "Password must include at least one special character.";
        } else {
            // Update the user in the database
            $status = updateSelfUser($_SESSION['update_id'], $username, $email, $password);
            if ($status) {
                header('location: ../view/home.php');
                unset($_SESSION['update_id']);
            } else {
                echo "An error occurred during the update.";
            }
        }
    }
} else {
    header('location: ../view/login.html');
}
?>
