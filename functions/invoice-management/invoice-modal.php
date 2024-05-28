<?php include '../../conn.php';

$id = $_POST['id'];
$current_month = date("F");
$sql = $mysqli->query("SELECT * FROM appen_management.time_management WHERE emp_id = '$id' AND month = '$current_month'");
$row = $sql->fetch_assoc();

$emp_sql = $mysqli->query("SELECT * FROM appen_management.employee_management WHERE id = '$id'");
$emp_row = $emp_sql->fetch_assoc();

?>

<div class="card-body" id='user-update'>
    <div class="container ">
        <div class="row">
            <div class="col-md-8 border p-2">
                <strong><?php echo $emp_row['first_name'] . " " . $emp_row['last_name'] ?></strong></div>
            <div class="col-6 col-md-4 border p-2"><strong><?php echo isset($row['month']) ? $row['month'] : "";  ?></strong></div>
        </div>
        <div class="row ">
            <div class="col-md-4 border">Date</div>
            <div class="col-md-4 border"># of Hours</div>
            <div class="col-md-4 border">Earn</div>
        </div>
        <?php
        $total_earn = 0;
        $date_data = array();
        while ($row = $sql->fetch_assoc()) {
            $date = $row['date'];
            if (!isset($date_data[$date])) {
                $date_data[$date] = array(
                    'no_of_hours' => 0,
                    'income' => 0
                );
            }
            $date_data[$date]['no_of_hours'] += $row['no_of_hours'];
            $date_data[$date]['income'] += $row['income'];
        }
        foreach ($date_data as $date => $data) {
            ?>
            <div class="row">
                <div class="col-md-4 border"><?php echo $date ?></div>
                <div class="col-md-4 border"><?php echo $data['no_of_hours'] ?></div>
                <div class="col-md-4 border"><?php echo $data['income'] ?></div>
            </div>
            <?php
            $total_earn += $data['income'];
        }
        ?>
        <div class="row">
            <div class="col-md-10 border d-flex justify-content-end"><strong>Total</strong></div>
            <div class="col-6 col-md-2 border"><strong><?php echo $total_earn ?></strong></div>
        </div>
    </div>


</div>
<div class="modal-footer p-1">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>