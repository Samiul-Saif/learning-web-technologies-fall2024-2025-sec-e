<?php

require_once("../model/user_model.php");

$user_name = $_REQUEST['user_name'];
$author_name = $_REQUEST['author_name'];
$contact_no= $_REQUEST['contact_no'];
$password= $_REQUEST['password'];
$confirm_password= $_REQUEST['confirm_password'];



if(empty(trim($user_name)) || empty(trim($password)) || empty(trim($confirm_password)) || empty(trim($author_name))  || empty(trim($confirm_password)) ){
    echo "please fill all the input fields<br>";
}
else if($password !== $confirm_password){
    echo "Pasword and confirm password does not match <br>";
}
else{

    
    $result = reg_user($user_name, $author_name, $contact_no, $password);
    if($result){
        header("location:../view/login.html");
    }
    else{
        echo "There is something error inserting the user";
    }
}


?>
