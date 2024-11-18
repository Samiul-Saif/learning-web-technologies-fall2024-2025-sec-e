<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    if ($email == null) {
        echo "Email cannot be empty";
    } else {
        $flag1 = false;
        $flag2 = false;


        for ($i = 0; $i < strlen($email); $i++) {
            if ($email[$i] == '@') {
                $flag1 = true;
            }
            if ($email[$i] == '.') {
                $flag2 = true;
            }
        }

        if ($flag1 && $flag2) {
            echo "Email is: " . $email;
            exit;
        } else {
            echo "Invalid format";
        }
    }
} else {
    header('Location: task2.html');
    exit;
}
?>
