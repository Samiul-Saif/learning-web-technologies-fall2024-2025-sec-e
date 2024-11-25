<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] !== true) {
    header('location: login.html');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
<table border="1" align="" width="35%" height="60">
<td>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    
    <p>Email: <?php echo $_SESSION['useremail']; ?></p>
    </td>
    
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>
