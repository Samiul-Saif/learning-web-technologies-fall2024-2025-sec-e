<?php
    session_start();
    require_once("../model/usermodel.php");
    if(!isset($_SESSION['status'])){
        header('location: login.html'); 
    }
    $idd = $_REQUEST['id'];
    $result = show_users();
?>
<html>
<head>
    <title>View Users</title>
</head>
<body>
        <h1 align="center">User list</h1>
        <table border=1 cellspacing="0" align="center" width="50%">
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th colspan="2">Action</th>
                
            </tr>
            <?php 
                 while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr align="center">
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $idd?>&idt=<?php echo $row['id']?>"> EDIT </a> 
                </td>
                <td>
                <a href="../model/delete_user.php?id=<?php echo $idd?>&idt=<?php echo $row['id']?>"> DELETE </a> 
                </td>
                <?php } ?>
            </tr>
                <tr align="center">
                <td colspan="6">
                    <a href="admin_home.php?id=<?php echo $idd ?>"> Go Home </a> 
                </td>
                </tr>
        </table>
</body>
</html>
