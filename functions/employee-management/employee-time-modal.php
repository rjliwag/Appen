<?php
require_once ("../../conn.php");

//-----------employee details-----------------// 
$id = $_POST['id'];
$sql = $mysqli->query("SELECT * FROM appen_management.employee_management WHERE id = '$id'");
$row = $sql->fetch_array();
$full_name = $row['first_name'] . " " . $row['last_name'];
$email_address = $row['email_address'];
$rate = $row['rate'];
//-----------------------------------------//

$time_sql = $mysqli->query("SELECT * FROM appen_management.time_management WHERE emp_id = '$id'");
$time_row =$time_sql->fetch_array();


?>

<div class="card-body" id='user-update'>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <input type="text" class="d-none" id="current_id" value="<?php echo $id ?>">
                <input type="text" class="d-none" id="current_rate" value="<?php echo $rate ?>">
                <p class="text-center h3"><?php echo strtoupper($full_name) ?></p>
                <p class="text-center "><?php echo $email_address ?></p>
                <p class="text-center " id="rate"><?php echo $rate."/hr" ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table">
    <thead class="table-dark">
        <tr>
            <th>Date</th>
            <th>Time-In</th>
            <th>Time-Out</th>
            <th># of hrs</th>
            <th>Rate / hr</th>
            <th>Earn</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        do { 
        ?>
            <tr>
                <td><?php echo isset($time_row['date'])? $time_row['date']: "" ?></td>
                <td><?php echo isset($time_row['time_in'])? $time_row['time_in']: ""  ?></td>
                <td><?php echo isset($time_row['time_out'])? $time_row['time_out']: ""  ?></td>
                <td><?php echo isset($time_row['no_of_hours'])? $time_row['no_of_hours']: ""  ?></td>
                <td><?php echo isset($time_row['rate'])? $time_row['rate']: ""  ?></td>
                <td><?php echo isset($time_row['income'])? $time_row['income']: ""  ?></td>
            </tr>
        <?php } while($time_row = $time_sql->fetch_array()); ?>
        
        
    </tbody>
</table>

            </div>
        </div>
    </div>

    <form class="needs-validation" id="addtimeForm" novalidate>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="date" required>
                        <label for="floatingInput">date</label>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="time" class="form-control"  id="time_in" required>
                        <label for="floatingInput">Time-In</label>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="time" class="form-control" id="time_out" required>
                        <label for="floatingInput">Time-out</label>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-floating mb-3">
                        <button type="button" class="btn btn-danger m-2" id="timeAddBtn"><i
                                class="fa-regular fa-square-plus"></i> ADD</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<div class="modal-footer p-1">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
