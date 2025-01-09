<?php
session_start();
require_once('../model/user.php');

if (!isset($_SESSION['status']) || $_SESSION['user']['user_type'] != 'farmer') {
    header('location: login.html');
    exit();
}

$advisors = getAdvisors();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
</head>
<body>
    <h2>Book an Appointment</h2>
    <form method="post" action="../controller/appointmentCheck.php">
        <label for="advisor">Advisor Name:</label>
        <select id="advisor" name="advisor_id" required>
            <option value="">Select an Advisor</option>
            <?php

            if (!empty($advisors)) {
                foreach ($advisors as $advisor) {
                    echo '<option value="' . htmlspecialchars($advisor['id']) . '">' . htmlspecialchars($advisor['username']) . '</option>';
                }
            } else {
                echo '<option value="">No advisors available</option>';
            }
            ?>
        </select><br><br>

        <label for="phone">Phone Number:</label>
<input type="tel" id="phone" name="phone_number" required>
<small>Format: 01232728365 (only 11 digits)</small><br><br>


        <label for="date">Preferred Date:</label>
        <input type="date" id="date" name="appointment_date" required><br><br>

        <label for="time">Preferred Time:</label>
        <input type="time" id="time" name="appointment_time" required><br><br>

        <label for="service">Service:</label>
        <select id="service" name="service" required>
            <option value="">Select a Service</option>
            <option value="Soil Management">Soil Management</option>
            <option value="Pest Control">Pest Control</option>
            <option value="Crop Monitoring">Crop Monitoring</option>
            <option value="Irrigation Planning">Irrigation Planning</option>
            <option value="Weather Advisory">Weather Advisory</option>
        </select><br><br>

        <label for="details">Additional Details:</label>
        <textarea id="details" name="details" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" name="submit" value="Book Appointment">
    </form>

    <br>
    <a href="home.php">Back to Home</a>
</body>
</html>
