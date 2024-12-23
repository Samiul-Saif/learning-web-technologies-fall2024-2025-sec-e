<?php
session_start();
require_once('../model/usermodel.php');

if (isset($_POST["signup"])) {
    // Extract and sanitize input
    $id = trim($_POST["id"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);
    $name = trim($_POST["name"]);
    $email = trim($_POST['email']);
    $type = isset($_POST['type']) ? $_POST['type'] : null;

    // Validate input fields
    if (empty($id) || empty($name) || empty($email) || empty($password) || empty($confirm_password) || !$type) {
        echo "<h3>Input fields cannot be empty</h3>";
    } elseif ($password !== $confirm_password) {
        echo "<h3>Password and Confirm password do not match</h3>";
    } else {
        // Initialize session users if not already set
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }

        // Attempt to add user
        $addUser = addUser($name, $id, $password, $email, $type);
        if ($addUser) {
            header("Location: ../view/login.html");
            exit();
        } else {
            header("Location: ../view/reg.html");
            exit();
        }
    }
} else {
    header("Location: ../view/reg.html");
    exit();
}
?>
