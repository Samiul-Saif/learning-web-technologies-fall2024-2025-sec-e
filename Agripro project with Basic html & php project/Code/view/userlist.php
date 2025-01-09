<?php
    session_start();
    require_once('../model/user.php');

    if(!isset($_SESSION['status'])){
        header('location: login.html');  
    }

    $users = getAllUser();
?>


<html lang="en">
<head>
    <title>Userlist </title>
</head>
<body>
        <h2>User List</h2>    
        <a href="home.php"> Back </a> | 
        <a href="../controller/logout.php"> logout </a>

        <br>

        <table border=1>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Account Type</th>
                <th>Action</th>
            </tr>
            <?php 
                for($i=0; $i<count($users); $i++){ 
            ?>
            <tr>
                <td><?php echo $users[$i]['id']; ?></td>
                <td><?=$users[$i]['username'] ?></td>
                <td><?=$users[$i]['email'] ?></td>
                <td><?=$users[$i]['user_type'] ?></td>
                <td>
                    <a href="edit.php?id=<?=$users[$i]['id']?>"> EDIT </a> |
                    <a href="delete.php?id=<?=$users[$i]['id']?>"> DELETE </a> 
                    <?php $_SESSION['requested_from']=basename($_SERVER['PHP_SELF']);?>
                </td>  
            </tr>

            <?php } ?>
        </table>
</body>
</html>
