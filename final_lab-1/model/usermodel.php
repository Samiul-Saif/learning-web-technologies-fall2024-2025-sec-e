<?php

function getConnection() {
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'agripro');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function login($id, $password) {
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE id = '{$id}' AND password = '{$password}'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    mysqli_close($conn);

    return isset($user['type']) ? $user['type'] : false;
}

function addUser($name, $id, $password, $email, $type) {
    $conn = getConnection();
    $sql = "INSERT INTO users (name, id, password, email, type) 
            VALUES ('$name', '$id', '$password', '$email', '$type')";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);

    return $result ? true : false;
}

function user_info($id) {
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    mysqli_close($conn);

    return $row;
}

function show_users() {
    $conn = getConnection();
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function delete_user($idt) {
    $conn = getConnection();
    $sql = "DELETE FROM users WHERE id = '$idt'";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);

    return $result ? true : false;
}

function edit_user($idt, $name, $email, $type) {
    $conn = getConnection();
    $sql = "UPDATE users 
            SET name = '$name', email = '$email', type = '$type' 
            WHERE id = '$idt'";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);

    return $result ? true : false;
}

?>
