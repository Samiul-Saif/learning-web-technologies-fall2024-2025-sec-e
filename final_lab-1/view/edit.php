<?php
session_start();
require_once('../model/usermodel.php');
if ($_SESSION['status'] == true) {   
    $idd = $_REQUEST['id'];
    $idt = $_REQUEST['idt'];
    $user_info = user_info($idt);
    $pass = $user_info['password'];
    $name = $user_info['name'];
    $email = $user_info['email'];
    $type = $user_info['type'];
}
?>

<html>
    <head>
        <title>Profile Edit</title>
    </head>
    <body>

        <table align="center" >
        <form action="../model/edit_user.php?id=<?php echo $idd ?>&idt=<?php echo $idt ?>" method="POST">
            <tr height="250px">
                <td></td>
            </tr>
            <tr>
                <td>ID</td>
                <td><input type="text" disabled value="<?php echo $idd ?>" name="id"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" disabled value="<?php echo $name ?>"></td>
            </tr>
            <tr>
                <td>New Username</td>
                <td><input type="text"  name="new_username"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" disabled value="<?php echo $email ?>"></td>
            </tr>
            <tr>
                <td>New email</td>
                <td><input type="email"  name="new_email"></td>
            </tr>
            <tr>
                <td>Type</td>
                <td><input type="text" disabled value="<?php echo $type ?>"></td>
            </tr>
            <tr>
                <td>New type</td>
                <td><input type="text"  name="new_type"></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" value="Submit" name="submit"> &nbsp; &nbsp; &nbsp;<input type="reset" value="Reset" name="reset"></td>
            </tr>
                
            </form>

        </table>
            
       
    </body>
</html>
