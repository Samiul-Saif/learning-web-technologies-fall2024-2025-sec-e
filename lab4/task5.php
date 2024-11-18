<?php 

    if(isset($_GET['submit'])){
        $username = $_GET['username'];
        $password = $_GET['password'];

        if($username == null || $password == null){
            echo "Null username/password";
        }elseif($username == $password){
            //echo "valid user";
            header('location: home.html');
        }

    
    }else{
        //echo "invalid request!";
        header('location: name.html');
    }


?>