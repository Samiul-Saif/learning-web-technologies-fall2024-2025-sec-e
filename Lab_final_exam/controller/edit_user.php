<?php
require_once("../model/user_model.php");
$old_user_name = $_REQUEST['old_user_name'];
$new_author_name = $_REQUEST['new_author_name'];
$new_contact_no = $_REQUEST['new_contact_no'];
$new_password = $_REQUEST['new_password'];

$result = change_author_info($old_user_name, $new_author_name, $new_contact_no, $new_password);
if($result == true){
    echo "edit success";
}
else{
    echo "failed to edit user";
}


?>