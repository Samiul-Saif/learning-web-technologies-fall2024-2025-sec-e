<?php
require_once("../model/user_model.php");
$user_name = $_REQUEST['user_name'];

$result = delete_author($user_name);

if($result){
    echo "delete succesfull";
}
else{
    echo "problem in deleting user";
}


?>