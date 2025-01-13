<?php

require_once("../model/user_model.php");

$user_name = $_REQUEST['user_name'];
$password= $_REQUEST['password'];

if(empty(trim($user_name)) || empty(trim($password))){
    echo "please fill all the input fields<br>";
}
else{
    
    $result = author_login($user_name, $password);
    if($result ==  true){
       header("location:../view/user_home.php");


    }
    else{
        echo "Invalid Name and Password";
    }
}


?>
