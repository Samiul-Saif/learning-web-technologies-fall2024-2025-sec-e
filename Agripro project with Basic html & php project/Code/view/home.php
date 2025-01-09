<?php
session_start();
require_once('../model/user.php');

if (!isset($_SESSION['status'])) {
    header('location: login.html');
    exit();
}

$advisor_id = $_SESSION['user']['id'];
$appointment_count = getAppointmentCountByAdvisor($advisor_id);
if ($_SESSION['user']['user_type'] == 'farmer') {
    $farmer_id = $_SESSION['user']['id'];
    $notification_count = getFarmerNotificationCount($farmer_id);
}
if ($_SESSION['user']['user_type'] == 'admin') {
    $admin_notifications = getAdminNotificationCount();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <table align="center" width="80%" cellpadding="10">
        <tr>
            <td align="center">
                <h1>Welcome Home, <?= $_SESSION['user']['username'] ?>!</h1>
            </td>
        </tr>
        <tr>
            <td align="center">
                <h3>User Details:</h3>
                <table border="1" cellpadding="5" cellspacing="0" align="center">
                    <?php foreach ($_SESSION['user'] as $key => $value): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($key) ?></strong></td>
                            <td><?= htmlspecialchars($value) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center">
                <h3>Actions:</h3>
                <p>
                    <?php if ($_SESSION['user']['user_type'] == 'admin'): ?>
                        <a href="userlist.php">View All Users</a> |
                        <a href="admin_report.php">Report</a> |
                    <?php endif; ?>
                    <?php if ($_SESSION['user']['user_type'] == 'farmer'): ?>
                        <a href="appointment.php">Book Appointment</a> |
                        <a href="farmer_confirmed_appointments.php">Confirmed Appointments</a> |
                    <?php endif; ?>
                    <?php if ($_SESSION['user']['user_type'] == 'advisor'): ?>
                        <a href="manage_appointment.php">Manage Appointments</a> |
                        <a href="confirmed_appointment.php">Confirmed Appointments</a> |
                    <?php endif; ?>
                    <a href="selfedit.php?id=<?= $_SESSION['user']['id'] ?>">Edit Own Profile</a> |
                    <?php $_SESSION['requested_from'] = basename($_SERVER['PHP_SELF']); ?>
                    <a href="../controller/logout.php">Logout</a>
                </p>
            </td>
        </tr>
        <tr>
            <td align="center">
                <h3>Notifications:</h3>
                <p>
                    <?php if ($_SESSION['user']['user_type'] == 'advisor'): ?>
                        You have <?= $appointment_count ?> appointment(s) pending.
                    <?php endif; ?>
                    <?php if ($_SESSION['user']['user_type'] == 'farmer'): ?>
                        You have <?= $notification_count ?> confirmed appointment(s).
                    <?php endif; ?>
                    <?php if ($_SESSION['user']['user_type'] == 'admin'): ?>
                        You have <?= $admin_notifications ?> new and confirmed appointment(s) to review.
                    <?php endif; ?>
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
