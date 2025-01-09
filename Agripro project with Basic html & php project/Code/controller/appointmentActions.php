<?php
session_start();
require_once('../model/user.php');

if (!isset($_SESSION['status']) || $_SESSION['user']['user_type'] != 'advisor') {
    header('location: ../view/login.html');
    exit();
}

if (isset($_POST['appointment_id']) && isset($_POST['action'])) {
    $appointment_id = intval($_POST['appointment_id']);
    $action = trim($_POST['action']);

    if ($action === 'cancel') {
        $status = cancelAppointment($appointment_id);
        if ($status) {
            echo "Appointment canceled successfully.";
        } else {
            echo "Failed to cancel appointment.";
        }
    } elseif ($action === 'reschedule') {

        $_SESSION['reschedule_appointment_id'] = $appointment_id;
        header('location: ../view/rescheduleAppointment.php');
        exit();
    }
} else {
    echo "Invalid request.";
}
?>
