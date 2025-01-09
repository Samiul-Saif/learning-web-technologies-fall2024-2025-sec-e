<?php
session_start();
require_once('../model/user.php');

if (!isset($_SESSION['status']) || $_SESSION['user']['user_type'] != 'advisor') {
    header('location: login.html');
    exit();
}

$advisor_id = $_SESSION['user']['id'];
$appointments = getAppointmentsByAdvisor($advisor_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
</head>
<body>
    <h2>Manage Appointments</h2>
    <?php if (!empty($appointments)): ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Farmer Name</th>
                    <th>Phone Number</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Service</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?=htmlspecialchars($appointment['farmer_name'])?></td>
                        <td><?=htmlspecialchars($appointment['phone_number'])?></td>
                        <td><?=htmlspecialchars($appointment['appointment_date'])?></td>
                        <td><?=htmlspecialchars($appointment['appointment_time'])?></td>
                        <td><?=htmlspecialchars($appointment['service'])?></td>
                        <td><?=htmlspecialchars($appointment['details'])?></td>
                        <td>
                            <form method="post" action="../controller/appointmentActions.php" style="display: inline;">
                                <input type="hidden" name="appointment_id" value="<?=htmlspecialchars($appointment['id'])?>">
                                <input type="hidden" name="action" value="reschedule">
                                <input type="submit" value="Reschedule">
                            </form>
                            <form method="post" action="../controller/appointmentActions.php" style="display: inline;">
                                <input type="hidden" name="appointment_id" value="<?=htmlspecialchars($appointment['id'])?>">
                                <input type="hidden" name="action" value="cancel">
                                <input type="submit" value="Cancel">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No appointments found.</p>
    <?php endif; ?>

    <br>
    <a href="home.php">Back to Home</a>
</body>
</html>
