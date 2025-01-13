<?php
require_once('../model/user_model.php');
$user_name = $_REQUEST['user_name'];
$user_info = user_info($user_name);
$author_name = $user_info['author_name'];
$contact_no = $user_info['contact_no'];
$password = $user_info['password'];
?>

<html>
    <head>
        <title>Edit User Page</title>
        <script src="../asset/edit_user.js"></script>
    </head>

    <body>

    <table align="center">
    <form action="../controller/edit_user.php" method="POST" onsubmit="return validateForm()">
        <tr>
            <td>Username</td>
            <td><input type="text" readonly value="<?php echo $user_name ?>" name="old_user_name" id="old_user_name_id"></td>
        </tr>
        <tr>
            <td>Employer Name</td>
            <td><input type="text" disabled value="<?php echo $author_name ?>" id="old_author_name_id"></td>
        </tr>
        <tr>
            <td>New Employer Name</td>
            <td><input type="text" name="new_author_name" id="new_author_name_id" onkeyup="check_name()">
            <p id="author_name_val" style="display:none;color: red;">Fill up the new employee name</p>
        </td>
        </tr>

        <tr>
            <td>Contact No</td>
            <td><input type="text" disabled value="<?php echo $contact_no ?>" id="old_contact_no_id"></td>
        </tr>
        <tr>
            <td>New Contact No</td>
            <td><input type="text" name="new_contact_no" id="new_contact_no_id" onkeyup="check_contact_no()">
            <p id="contact_no_val" style="display:none;color: red;">Fill up the new contact no</p>
        </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" disabled value="<?php echo $password ?>"></td>
        </tr>
        <tr>
            <td>New Password</td>
            <td><input type="text" name="new_password" id="new_password_id" onkeyup="check_password()">
            <p id="password_val" style="display:none;color: red;">Fill up the new password</p>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" value="Submit" name="submit"> &nbsp; &nbsp; &nbsp;<input type="reset" value="Reset" name="reset"></td>
        </tr>
        <tr>
          <td colspan="2"><a href="show_all_user.php"> Go Back</a></td>
        </tr>
    </form>
    </table>

    </body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['old_user_name']) && isset($_POST['new_author_name']) && isset($_POST['new_contact_no']) && isset($_POST['new_password'])) {
        
        $old_user_name = $_POST['old_user_name'];
        $new_author_name = $_POST['new_author_name'];
        $new_contact_no = $_POST['new_contact_no'];
        $new_password = $_POST['new_password'];
        if (empty($new_author_name)) {
            echo "<script>alert('Fill up the new Author name');</script>";
        } elseif (empty($new_contact_no)) {
            echo "<script>alert('Fill up the new contact no');</script>";
        } elseif (empty($new_password)) {
            echo "<script>alert('Fill up the new password');</script>";
        } else {
            $result = change_author_info($old_user_name, $new_author_name, $new_contact_no, $new_password);
            
            if ($result) {
                echo "<script>alert('Edit Success!');</script>";
            } else {
                echo "<script>alert('Failed to edit user.');</script>";
            }
        }
    } else {
        echo "<script>alert('Required fields are missing.');</script>";
    }
}
?>
