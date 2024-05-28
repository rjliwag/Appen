<?php
session_start();

include 'conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM appen_management.admin_account WHERE username = '$username' AND `password` = '$password'";
$result = $mysqli->query($query);
$row = $result->fetch_array();

$response = array();

if ($result) {
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $row['username'];
        $response['status'] = 'success';
        $response['redirect'] = 'index.php';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid username or password';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = "ERROR: " . $mysqli->error;
}

echo json_encode($response);
?>
