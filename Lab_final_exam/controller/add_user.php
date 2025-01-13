<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once("../model/user_model.php");
    $user_name = trim($_POST['user_name']);
    $author_name = trim($_POST['author_name']);
    $contact_no = trim($_POST['contact_no']);
    $password = trim($_POST['password']);
    
    if (empty($user_name) || empty($author_name) || empty($contact_no) || empty($password)) {
        echo "<script>alert('All fields are required.');</script>";
    } else {
        if (!is_numeric($contact_no)) {
            echo "<script>alert('Please enter a valid contact number.');</script>";
        } else {
            $result = add_user($user_name, $author_name, $contact_no, $password);
            if ($result) {
                echo "<script>alert('User added successfully!'); window.location.href = '../view/show_all_user.php';</script>";
            } else {
                echo "<script>alert('Failed to add user.');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>

    <h1 style="text-align: center;">Add New Author</h1>

    <form action="add_user.php" method="POST" style="margin: 0 auto; width: 400px; border: 1px solid #000; padding: 20px; border-radius: 5px;">
        <table width="100%" cellpadding="5">
            <tr>
                <td>User Name:</td>
                <td>
                    <input type="text" name="user_name" required>
                </td>
            </tr>
            <tr>
                <td>Author Name:</td>
                <td>
                    <input type="text" name="author_name" required>
                </td>
            </tr>
            <tr>
                <td>Contact No:</td>
                <td>
                    <input type="text" name="contact_no" required>
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Add User"> 
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <a href="../view/show_all_user.php" style="text-decoration: none;">
            <button style="padding: 10px 20px;">Back to Author List</button>
        </a>
    </div>

</body>
</html>
