<?php
session_start();
require_once('../model/usermodel.php');

if ($_SESSION['status'] === true) {
    $idd = $_REQUEST['id'];

    // Fetch user information from the database
    $user_info = user_info($idd);
    $name = $user_info['name'];
    $id = $user_info['id'];
    $email = $user_info['email'];
    $type = $user_info['type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>
<body>
    <table align="center" border="1" cellspacing="0" width="300px" height="300px">
        <tr align="center">
            <td colspan="2"><strong>Profile</strong></td>
        </tr>
        <tr align="center">
            <td><strong>Id</strong></td>
            <td><?php echo htmlspecialchars($id); ?></td>
        </tr>
        <tr align="center">
            <td><strong>Name</strong></td>
            <td><?php echo htmlspecialchars($name); ?></td>
        </tr>
        <tr align="center">
            <td><strong>Email</strong></td>
            <td><?php echo htmlspecialchars($email); ?></td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <?php if ($type === 'Admin') { ?>
                    <a href="admin_home.php?id=<?php echo urlencode($idd); ?>">Go Home</a>
                <?php } else if ($type === 'User') { ?>
                    <a href="user_home.php?id=<?php echo urlencode($idd); ?>">Go Home</a>
                <?php } else { ?>
                    <a href="guest_home.php?id=<?php echo urlencode($idd); ?>">Go Home</a>
                <?php } ?>
            </td>
        </tr>
    </table>
</body>
</html>
<?php
} else {
    header("Location: login.html");
    exit();
}
?>
