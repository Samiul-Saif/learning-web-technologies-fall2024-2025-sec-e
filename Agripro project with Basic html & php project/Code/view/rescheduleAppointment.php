<?php
session_start();
require_once('../model/user.php');

if (!isset($_SESSION['status']) || $_SESSION['user']['user_type'] != 'advisor' || !isset($_SESSION['reschedule_appointment_id'])) {
    header('location: ../view/login.html');
    exit();
}

$appointment_id = $_SESSION['reschedule_appointment_id'];
$appointment = getAppointmentById($appointment_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reschedule Appointment</title>
</head>
<body>
    <h2>Reschedule Appointment</h2>
    <?php if ($appointment): ?>
        <form method="post" action="../controller/rescheduleAppointmentCheck.php">
            <input type="hidden" name="appointment_id" value="<?=htmlspecialchars($appointment['id'])?>">
            <label for="date">New Date:</label>
            <input type="date" id="date" name="appointment_date" required><br><br>

            <label for="time">New Time:</label>
            <input type="time" id="time" name="appointment_time" required><br><br>

            <input type="submit" value="Reschedule">
        </form>
    <?php else: ?>
        <p>Appointment not found.</p>
    <?php endif; ?>

    <br>
    <a href="manage_appointment.php">Back to Manage Appointments</a>
</body>
</html>
