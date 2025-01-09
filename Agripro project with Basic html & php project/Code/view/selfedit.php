<?php
    session_start();
    require_once('../model/user.php');
    if(!isset($_SESSION['status'])){
        header('location: login.html');  
    }

    $user = getUser($_REQUEST['id']);
    $_SESSION['update_id'] = $_REQUEST['id'];
?>

<html>
<head>
    <title>Edit Page</title>
</head>
<body>
        <h2>Edit User</h2>
        <form method="post" action="../controller/selfupdate.php" enctype=""> 
            Name: <input type="text" name="username" value="<?=$user['username']?>" required /> <br>
            Email: <input type="email" name="email" value="<?=$user['email']?>" required /><br>
            password: <input type="password" name="password" value="<?=$user['password']?>" required /><br>
            Account Type:
            <input type="submit" name="submit" value="Update" />
        </form>
        <br>
        <?php
            if($_SESSION['requested_from'] == 'home.php'){
        ?>
        <a href="home.php">Cancel</a> 
        <?php }else { ?>
        <a href="home.php">Cancel</a> 
        <?php } ?>
</body>
</html>