<?php
session_start();

if ($_SESSION['status'] === true) {
    // Retrieve input parameters
    $idd = $_POST['id'];
    $new_pass = $_POST['password'];

    // Database connection
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'agripro');

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Update password query
    $sql = "UPDATE users SET password = '$new_pass' WHERE id = '$idd'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Password changed successfully.";
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
} else {
    header("Location: login.html");
    exit();
}
?>
