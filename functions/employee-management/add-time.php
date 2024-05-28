<?php
include '../../conn.php';

$id = isset($_POST['id'])? $_POST['id'] : "";
$rate = isset($_POST['rate'])? $_POST['rate'] : "";
$date = isset($_POST['date'])? $_POST['date'] : "";
$time_in = strtotime(isset($_POST['time_in'])? $_POST['time_in'] : "");
$time_out = strtotime(isset($_POST['time_out'])? $_POST['time_out'] : "") ;

$timestamptotalhrs = $time_out - $time_in;
$hours = floor($timestamptotalhrs/3600);
$minutes = floor(($timestamptotalhrs % 3600)/60);

$decimal_hours = $hours + ($minutes / 60); // Convert minutes to fraction of an hour
$decimal_hours = number_format($decimal_hours, 2); // Limit to 2 decimal places

$time_in_format = date("H:i", $time_in);
$time_out_format = date("H:i", $time_out);

$income = $decimal_hours * $rate;
$income = number_format($income, 2); // Limit to 2 decimal places

$month = date("M",$time_in);

$query = $mysqli->query("
INSERT INTO $database.time_management
SET
emp_id = '$id',
date = '$date',
time_in = '$time_in_format',
time_out = '$time_out_format',
rate = '$rate',
no_of_hours = '$decimal_hours',
income = '$income',
month = '$month'
");

if($query){
    echo "Successful";
}

?>
