<?php
session_start();
require_once('../model/user.php');

if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user']['id'];
    $advisor_id = trim($_POST['advisor_id']);
    $phone_number = trim($_POST['phone_number']);
    $appointment_date = trim($_POST['appointment_date']);
    $appointment_time = trim($_POST['appointment_time']);
    $service = trim($_POST['service']);
    $details = trim($_POST['details']);


    $errors = [];

    // Validation
    if (empty($advisor_id)) {
        $errors[] = "Advisor ID is required!";
    }

    // Phone number validation
    if (empty($phone_number)) {
        $errors[] = "Phone number is required!";
    } elseif (strlen($phone_number) != 11) {
        $errors[] = "Phone number must be exactly 11 digits!";
    } elseif (substr($phone_number, 0, 2) != "01") {
        $errors[] = "Phone number must start with '01'!";
    } elseif (!is_numeric($phone_number)) {
        $errors[] = "Phone number must contain only numbers!";
    }

    // Appointment date validation
    if (empty($appointment_date)) {
        $errors[] = "Appointment date is required!";
    } else {
        // Simple date validation (check if it's in YYYY-MM-DD format)
        $date_parts = explode("-", $appointment_date);
        if (count($date_parts) != 3 || !checkdate($date_parts[1], $date_parts[2], $date_parts[0])) {
            $errors[] = "Invalid appointment date format. Please use YYYY-MM-DD!";
        }
    }

    // Appointment time validation
    if (empty($appointment_time)) {
        $errors[] = "Appointment time is required!";
    } else {
        // Simple time validation (check if it's in HH:MM format)
        $time_parts = explode(":", $appointment_time);
        if (count($time_parts) != 2 || !is_numeric($time_parts[0]) || !is_numeric($time_parts[1]) || $time_parts[0] < 0 || $time_parts[0] > 23 || $time_parts[1] < 0 || $time_parts[1] > 59) {
            $errors[] = "Invalid appointment time format. Please use HH:MM (24-hour format)!";
        }
    }

    if (empty($service)) {
        $errors[] = "Service is required!";
    }
    if (empty($details)) {
        $errors[] = "Details are required!";
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        $status = addAppointment($user_id, $advisor_id, $phone_number, $appointment_date, $appointment_time, $service, $details);
        if ($status) {
            header('location: ../view/home.php');
        } else {
            echo "Failed to book the appointment.";
        }
    }
} else {
    header('location: ../view/appointment.php');
}
?>
