<?php 
    session_start();
    require_once('../model/user.php');
    if(isset($_REQUEST['submit'])){
            $status = deleteUser($_SESSION['delete_id']);
            if($status){
                header('location: ../view/userlist.php');
                unset($_SESSION['delete_id']);
            } else{
                echo "an error occured";
                ?>
                <a href="../view/userlist.php"> Return to Userlist </a>
<?php
                
            }
        }

    else{
        header('location: ../view/signup.html');
    }

?>