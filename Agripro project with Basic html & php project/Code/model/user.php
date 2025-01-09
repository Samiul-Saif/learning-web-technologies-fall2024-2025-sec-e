<?php

    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'project');
        return $con;
    }

    function login($username, $password){
        $con = getConnection();
        $sql = "select * from users where username='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count ==1){
            return true;
        }else{
            return false;
        }
    }

    function userExists($username){
        $con = getConnection();
        $sql = "select * from users where username='{$username}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count==0){
            return false;
        }else{
            return true;
        }
    }

    function addUser($username, $email, $password, $user_type){
        $con = getConnection();
        $sql = "insert into users VALUES('', '{$username}', '{$email}', '{$password}', '{$user_type}')";
        if(mysqli_query($con, $sql)){
            return true;
        } else{
            return false;
        }
    }

    function updateUser($id, $username, $email, $password, $user_type){
        $con = getConnection();
        $sql = "update users SET username='$username', password='$password', email='$email', user_type='{$user_type}' where id='$id'";
        if(mysqli_query($con, $sql)){
            return true;
        } else{
            return false;
        }
    }

    function deleteUser($id){
        $con = getConnection();
        $sql = "DELETE FROM users where id=$id";
        if(mysqli_query($con, $sql)){
            return true;
        } else{
            return false;
        }
    }

    function getUser($id){
        $con = getConnection();
        $sql = "select * from users where id='{$id}'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function getUserInfo($username){
        $con = getConnection();
        $sql = "select * from users where username='{$username}'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function getAllUser(){
        $con = getConnection();
        $sql = "select * from users";
        $result = mysqli_query($con, $sql);

        $users = [];

        while($row = mysqli_fetch_assoc($result)){
            array_push($users, $row);
        }
        
        return $users;
    }
function getAdvisors() {
    $con = getConnection();
    $sql = "SELECT id, username FROM users WHERE user_type = 'advisor'";
    $result = mysqli_query($con, $sql);

    $advisors = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $advisors[] = $row;
        }
    }

    return $advisors;
}

function addAppointment($user_id, $advisor_id, $phone_number, $appointment_date, $appointment_time, $service, $details) {
    $con = getConnection();
    $sql = "INSERT INTO appointments (user_id, advisor_id, phone_number, appointment_date, appointment_time, service, details) 
            VALUES ('{$user_id}', '{$advisor_id}', '{$phone_number}', '{$appointment_date}', '{$appointment_time}', '{$service}', '{$details}')";
    return mysqli_query($con, $sql);
}
    
function getAppointmentsByAdvisor($advisor_id) {
    $con = getConnection();
    $sql = "SELECT a.*, u.username AS farmer_name 
            FROM appointments a 
            JOIN users u ON a.user_id = u.id 
            WHERE a.advisor_id = '{$advisor_id}'";
    $result = mysqli_query($con, $sql);

    $appointments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }

    return $appointments;
}   


function cancelAppointment($appointment_id) {
    $con = getConnection();
    $sql = "DELETE FROM appointments WHERE id = '{$appointment_id}'";
    return mysqli_query($con, $sql);
}

function getAppointmentById($appointment_id) {
    $con = getConnection();
    $sql = "SELECT * FROM appointments WHERE id = '{$appointment_id}'";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}

function rescheduleAppointment($appointment_id, $new_date, $new_time) {
    $con = getConnection();

    $sql = "SELECT * FROM appointments WHERE id = '{$appointment_id}'";
    $result = mysqli_query($con, $sql);
    $appointment = mysqli_fetch_assoc($result);

    if ($appointment) {

        $sql_insert = "INSERT INTO confirmed_appointments (id, user_id, advisor_id, phone_number, appointment_date, appointment_time, service, details, notified) 
                       VALUES ('{$appointment['id']}', '{$appointment['user_id']}', '{$appointment['advisor_id']}', '{$appointment['phone_number']}', '{$new_date}', '{$new_time}', '{$appointment['service']}', '{$appointment['details']}', 0)";
        mysqli_query($con, $sql_insert);


        $sql_delete = "DELETE FROM appointments WHERE id = '{$appointment_id}'";
        mysqli_query($con, $sql_delete);

        return true;
    }

    return false;
}


function getAppointmentCountByAdvisor($advisor_id) {
    $con = getConnection();
    $sql = "SELECT COUNT(*) AS appointment_count FROM appointments WHERE advisor_id = '{$advisor_id}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['appointment_count'];
}

function getConfirmedAppointments($advisor_id) {
    $con = getConnection();
    $sql = "SELECT c.*, u.username AS farmer_name 
            FROM confirmed_appointments c 
            JOIN users u ON c.user_id = u.id 
            WHERE c.advisor_id = '{$advisor_id}'";
    $result = mysqli_query($con, $sql);

    $appointments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }

    return $appointments;
}


function getFarmerNotificationCount($farmer_id) {
    $con = getConnection();
    $sql = "SELECT COUNT(*) AS notification_count 
            FROM confirmed_appointments 
            WHERE user_id = '{$farmer_id}' AND notified = 0";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['notification_count'] ?? 0;
}


function getConfirmedAppointmentsForFarmer($farmer_id) {
    $con = getConnection();
    $sql = "SELECT c.*, u.username AS advisor_name 
            FROM confirmed_appointments c 
            JOIN users u ON c.advisor_id = u.id 
            WHERE c.user_id = '{$farmer_id}'";
    $result = mysqli_query($con, $sql);

    $appointments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }


    $sql_update = "UPDATE confirmed_appointments SET notified = 1 WHERE user_id = '{$farmer_id}' AND notified = 0";
    mysqli_query($con, $sql_update);

    return $appointments;
}

function getAdvisorAppointments() {
    $con = getConnection();
    $sql = "SELECT a.*, 
                   u1.username AS farmer_name, 
                   u2.username AS advisor_name 
            FROM appointments a 
            JOIN users u1 ON a.user_id = u1.id 
            JOIN users u2 ON a.advisor_id = u2.id";
    $result = mysqli_query($con, $sql);

    $appointments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }
    return $appointments;
}

function getFarmerAppointments() {
    $con = getConnection();
    $sql = "SELECT c.*, 
                   u.username AS farmer_name, 
                   a.username AS advisor_name 
            FROM confirmed_appointments c 
            JOIN users u ON c.user_id = u.id 
            JOIN users a ON c.advisor_id = a.id"; // Join to get advisor name
    $result = mysqli_query($con, $sql);

    $appointments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }
    return $appointments;
}



function getAdminNotificationCount() { 
    $con = getConnection();
    
    // Count new appointments
    $sql_new_appointments = "SELECT COUNT(*) AS new_appointments 
                             FROM appointments 
                             WHERE notified_admin = 0";
    $result_new = mysqli_query($con, $sql_new_appointments);
    $row_new = mysqli_fetch_assoc($result_new);
    $new_appointments = $row_new['new_appointments'] ?? 0;

    // Count confirmed appointments
    $sql_confirmed_appointments = "SELECT COUNT(*) AS confirmed_appointments  
                                   FROM confirmed_appointments
                                   WHERE notified_admin = 0";
    $result_confirmed = mysqli_query($con, $sql_confirmed_appointments);
    $row_confirmed = mysqli_fetch_assoc($result_confirmed);
    $confirmed_appointments = $row_confirmed['confirmed_appointments'] ?? 0;

    // Return the total count
    return $new_appointments + $confirmed_appointments;
}

function markAdminNotificationsAsRead() {
    $con = getConnection();
    $sql_appointments = "UPDATE appointments SET notified_admin = 1 WHERE notified_admin = 0";
    mysqli_query($con, $sql_appointments);

    $sql_confirmed_appointments = "UPDATE confirmed_appointments SET notified_admin = 1 WHERE notified_admin = 0";
    mysqli_query($con, $sql_confirmed_appointments);
}

?>