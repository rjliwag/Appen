<?php
!include '../../conn.php';

$first_name = isset($_POST['first_name'])? $_POST['first_name'] : "";
$last_name = isset($_POST['last_name'])? $_POST['last_name'] : "";
$email_address = isset($_POST['email_address'])? $_POST['email_address'] : "";
$project_assign = isset($_POST['project_assign'])? $_POST['project_assign'] : "";
$rate = isset($_POST['rate'])? $_POST['rate'] : "";

$query = $mysqli->query("
INSERT INTO $database.employee_management
set
first_name = '$first_name',
last_name = '$last_name',
email_address = '$email_address',
project_assign = '$project_assign',
rate = '$rate',
date_hired = Now()
");

if($query){
    echo "Successful";
}

?>