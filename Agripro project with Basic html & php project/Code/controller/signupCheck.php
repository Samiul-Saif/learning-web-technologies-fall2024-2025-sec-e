<?php 
    session_start();
    require_once('../model/user.php');
    
    if(isset($_REQUEST['submit'])){
        $username = trim($_REQUEST['username']);
        $password = trim($_REQUEST['password']);
        $confirm_pass = trim($_REQUEST['confirm_password']);
        $email = trim($_REQUEST['email']);
        $user_type = trim($_REQUEST['user_type']);

  
        if($username == null || empty($password) || empty($email)){
            echo "Username, password, and email cannot be empty.";
        }

        elseif($password != $confirm_pass){
            echo "Password doesn't match with confirm password.";
        }

        elseif(userExists($username) == true){
            echo "Username is already taken. Choose another one.";
        }

        elseif (!isValidEmail($email)) {
            echo "Invalid email format.";
        }
     
        elseif (strlen($password) < 4) {
            echo "Password must be at least 8 characters long.";
        }
       
        elseif (!containsLetter($password) || !containsNumber($password)) {
            echo "Password must contain both letters and numbers.";
        }
        else{
           
            $status = addUser($username, $email, $password, $user_type);
            if($status){
                header('location: ../view/login.html');
            } else{
                header('location: ../view/signup.html');
            }
        }
    }else{
        header('location: ../view/signup.html');
    }

    
    function containsLetter($str) {
        
        for ($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];
            
            if (($char >= 'a' && $char <= 'z') || ($char >= 'A' && $char <= 'Z')) {
                return true;
            }
        }
        return false;
    }


    function containsNumber($str) {
       
        for ($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];
            
            if ($char >= '0' && $char <= '9') {
                return true;
            }
        }
        return false;
    }

    function isValidEmail($email) {
        $atPos = strpos($email, '@');
        $dotPos = strrpos($email, '.');
        
        if ($atPos !== false && $dotPos !== false && $atPos < $dotPos) {
            return true;
        }
        return false;
    }
?>
