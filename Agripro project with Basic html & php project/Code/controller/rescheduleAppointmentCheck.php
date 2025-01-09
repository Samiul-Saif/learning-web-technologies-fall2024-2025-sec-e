<?php
session_start();
require_once('../model/user.php');

if (isset($_POST['appointment_id']) && isset($_POST['appointment_date']) && isset($_POST['appointment_time'])) {
    $appointment_id = intval($_POST['appointment_id']);
    $new_date = trim($_POST['appointment_date']);
    $new_time = trim($_POST['appointment_time']);

    $status = rescheduleAppointment($appointment_id, $new_date, $new_time);
    if ($status) {
        echo "Appointment rescheduled successfully.";
    } else {
        echo "Failed to reschedule appointment.";
    }
} else {
    echo "Invalid request.";
}
?>
