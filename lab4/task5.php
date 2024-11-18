<?php 
    if (isset($_POST['submit'])) {
        if (!empty($_POST['Degree']) && count($_POST['Degree']) >= 2) {
            echo "Selected the following degrees: ";
            $degrees = $_POST['Degree'];
            for ($i = 0; $i < count($degrees); $i++) {
                echo $degrees[$i];
                if ($i < count($degrees) - 1) {
                    echo ", ";
                }
            }
        } else {
            echo "Select at least two degrees.";
        }
    } else {
        header('location: name.html');
    }
?>
