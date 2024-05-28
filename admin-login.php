<?php
session_start();

include 'conn.php';

$username = $_POST['username'];
$password = $_POST['password'];


$query = "SELECT * FROM appen_management.admin_account WHERE username = '$username' AND `password` = '$password'";
$result = $mysqli->query($query);
$row = $result->fetch_array();

if ($result) {
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $row['username'];
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
        header("Location: index.php");
        exit();
    }
} else {
    echo "ERROR: " . $mysqli->error;
}


?>