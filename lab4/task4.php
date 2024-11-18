<?php 

if (isset($_POST['submit'])) {
    if (!empty($_POST['group'])) {
        $gender = $_POST['group'];
        echo "You selected: " . $gender;
    } else {
        echo "Please select a gender.";
    }
} else {
    header('Location: task4.html');

}

?>