<?php 
    session_start();

    if (isset($_REQUEST['submit'])) {
        $email = trim($_REQUEST['email']);
        $password = trim($_REQUEST['password']);

        if ($email == null || $password == null) {
            echo "Email/Password cannot be empty!";
        } elseif (isset($_SESSION['users'][$email]) && $_SESSION['users'][$email]['password'] === $password) {
            $_SESSION['status'] = true;
            $_SESSION['username'] = $_SESSION['users'][$email]['name'];
            $_SESSION['useremail'] = $email;
            header('location: home.php');
        } else {
            echo "Invalid email or password!";
        }
    } else {
        header('location: login.html');
    }
?>
