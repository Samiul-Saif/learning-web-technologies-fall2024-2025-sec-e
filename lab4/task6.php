<?php 

if (isset($_POST['submit'])) {
    if (!empty($_POST['blood_group'])) {
        $blood_group = $_POST['blood_group'];
        echo "You selected: " . $blood_group;
    } else {
        echo "Please select a blood_group.";
    }
} else {
    header('Location: task6.html');

}

?>