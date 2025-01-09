<?php 
    session_start();
    require_once('../model/user.php');
    if(isset($_REQUEST['submit'])){
        $username = trim($_REQUEST['username']);
        $password = trim($_REQUEST['password']);
        $email = trim($_REQUEST['email']);
        $user_type = trim($_REQUEST['user_type']);

        if($username == null || empty($password) || empty($email) || empty($user_type)){
            echo "Null username/password/email/user_type";
        }else{
            $status = updateUser($_SESSION['update_id'], $username, $email, $password, $user_type);
            if($status){
                header('location: ../view/userlist.php');
                unset($_SESSION['update_id']);
            } else{
                echo "an error occured";
                ?>
                <a href="../view/userlist.php"> Return to Userlist </a>
<?php
                
            }
        }

    }else{
        header('location: ../view/signup.html');
    }

?>