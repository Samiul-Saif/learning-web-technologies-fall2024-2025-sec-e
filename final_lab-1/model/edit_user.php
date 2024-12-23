<?php
// Retrieve input parameters
$idd = $_REQUEST['id'];
$idt = $_REQUEST['idt'];
$name = $_POST['new_username'];
$email = $_POST['new_email'];
$type = $_POST['new_type'];

require_once("usermodel.php");

// Attempt to edit user details
$result = edit_user($idt, $name, $email, $type);

if ($result) {
    echo "User edited successfully.";
} else {
    echo "An error occurred.";
}
?>

<!-- Navigation link -->
<a href="../view/view_users.php?id=<?php echo $idd; ?>">Go Back</a>
