<?php
session_start();
require_once('../model/usermodel.php');
if($_SESSION['status'] == true){   
    $idd = $_REQUEST['id'];
    $user_info = user_info($idd);
    $pass = $user_info['password'];
    $name = $user_info['name'];
}

?>

<html>
    <head>
        <title>pass change</title>
    </head>

    <body>

    <table align="center" >
    <form action="../model/pass_change_db.php" method="POST">
        <tr height="250px">
            <td></td>
        </tr>
        <tr>
            <td>ID</td>
            <td><input type="text" value="<?php echo $idd ?>" name="id"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" disabled value="<?php echo $name ?>"></td>
        </tr>
        <tr>
            <td>Old Password</td>
            <td><input type="text" disabled value="<?php echo $pass?>" > </td>
        </tr>
        <tr>
            <td>
            New Password
            </td>
            <td><input name="password" type="text"> </td>
        </tr>
        <tr>
            <td>Confirm New Password</td>
            <td><input type="text" value=" "> </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Submit" name="submit"> &nbsp; &nbsp; &nbsp;<input type="reset" value="Reset" name="reset"></td>
        </tr>
            
        </form>

    </table>
        
       
    </body>
</html>