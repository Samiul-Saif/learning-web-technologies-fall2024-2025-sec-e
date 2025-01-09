<?php
session_start();
require_once('../model/user.php');

if (!isset($_SESSION['status']) || $_SESSION['user']['user_type'] != 'advisor') {
    header('location: login.html');
    exit();
}

$advisor_id = $_SESSION['user']['id'];
$confirmed_appointments = getConfirmedAppointments($advisor_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Appointments</title>
</head>
<body>
    <h1>Confirmed Appointments</h1>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Farmer Name</th>
            <th>Phone Number</th>
            <th>Date</th>
            <th>Time</th>
            <th>Service</th>
            <th>Details</th>
        </tr>
        <?php foreach ($confirmed_appointments as $appointment): ?>
            <tr>
                <td><?=htmlspecialchars($appointment['farmer_name'])?></td>
                <td><?=htmlspecialchars($appointment['phone_number'])?></td>
                <td><?=htmlspecialchars($appointment['appointment_date'])?></td>
                <td><?=htmlspecialchars($appointment['appointment_time'])?></td>
                <td><?=htmlspecialchars($appointment['service'])?></td>
                <td><?=htmlspecialchars($appointment['details'])?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="home.php">Back to Home</a></p>
</body>
</html>
