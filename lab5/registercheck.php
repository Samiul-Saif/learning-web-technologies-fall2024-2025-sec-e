<?php 
    session_start();

    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }

    if (isset($_REQUEST['submit'])) {
        $name = trim($_REQUEST['name']);
        $age = trim($_REQUEST['age']);
        $email = trim($_REQUEST['email']);
        $gender = trim($_REQUEST['gender']);
        $password = trim($_REQUEST['password']);
        $repassword = trim($_REQUEST['repassword']);

        if ($name == null || $age == null || $email == null || $gender == null || $password == null || $repassword == null) {
            echo "Fill all the information";
        } elseif ($password !== $repassword) {
            echo "Incorrect password";
        } else {
            $_SESSION['users'][$email] = [
                'name' => $name,
                'age' => $age,
                'email' => $email,
                'gender' => $gender,
                'password' => password_hash($password, PASSWORD_BCRYPT)
            ];
            echo "Thanks for registration<br>";
            echo "<a href='login.html'>Login</a>"; 
        }
    } else {
        header('location: registration.html');
        exit();
    }
?>
