<?php 

if(isset($_GET['submit'])){
    $date = $_GET['date'];

    if($date == null) {
        echo "Date cannot be empty.";
    } else {
        $dateParts = explode('-', $date);
        if (count($dateParts) == 3) {
            $day = (int)$dateParts[0];
            $month = (int)$dateParts[1];
            $year = (int)$dateParts[2];
            echo "Day: " . $day . "<br>";
            echo "Month: " . $month . "<br>";
            echo "Year: " . $year . "<br>";
            if ($day >= 1 && $day <= 31 && $month >= 1 && $month <= 12 && $year >= 1953 && $year <= 1998) {
                header('location: home.html');
            } else {
                echo "Invalid year should be in between 1953 and 1998.";
            }
        } else {
            echo "Invalid date ,Use format dd-mm-yyyy";
        }
    }
} else {
    header('location: task3.html');
}

?>
