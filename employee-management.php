<?php include "header.php";
include "nav-menu.php";
!include "conn.php";
?>


<div class="main-content mt-3 bg-light">
    <div class="bg-white border-bottom">
        <p class="h3 text-dark ms-3">Employee Management</p>
    </div>

    <div class="container mt-4">
        <?php include 'functions/employee-management/tab-menu.php'; ?>

        <div class="tab-content_wrap bg-white ">
            <div class="dt-button_wrap position-absolute  end-0 mt-3 me-2">
                <button type="button" class="btn btn btn-dark add-new_request " class="btn btn-primary"
                    data-bs-toggle="modal" data-bs-target="#myModal">Add New Employee <i
                        class="fa-solid fa-circle-plus"></i></button>
            </div>
            <div class="row">
                <div class="col-sm-12 mt-3">
                    <h3 class="text-center">Employees</h3>
                </div>
            </div>
            <div class="row">
                <div class=" mt-2">
                    <table id="appenTable" class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Project Assign</th>
                                <th>Rate/ hr</th>
                                <th>Date Hired</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- The Modal -->
<div class="modal fade bd-example-" id="myModal">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Employee details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form class="needs-validation" novalidate>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="form-floating mb-3 col">
                                <input type="text" class="form-control" id="first_name" placeholder="firstname"
                                    required>
                                <label class="ms-2" for="floatingInput">First Name</label>
                                <div class="invalid-feedback">
                                    Please Enter valid inputs.
                                </div>
                            </div>
                            <div class="form-floating mb-3 col">
                                <input type="text" class="form-control" id="last_name" placeholder="lastname" required>
                                <label class="ms-2" for="floatingInput">Last Name</label>
                                <div class="invalid-feedback">
                                    Please Enter valid inputs.
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email_address" placeholder="name@example.com"
                                required>
                            <label for="floatingInput">Email address</label>
                            <div class="invalid-feedback">
                                Please Enter valid inputs.
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-floating mb-3 col-8">
                                <select  id="project_assign" class="form-select" aria-label="Default select example" required>
                                    
                                    <option value="" disabled selected>Select a Project Assign</option>

                                    <?php
                                    $sql = "SELECT project_name FROM appen_management.project_managemennt
                                    ";

                                    $projaquery = $mysqli->query($sql);
                                    
                                    if($projaquery->num_rows > 0) {
                                        while($row = $projaquery->fetch_array()){
                                            $project_name = isset($row['project_name']) ? $row ['project_name'] :"";
                                            echo "<option value='" .$project_name. "'>" . $project_name . "</option>";
                                        }
                                    }
                                    
                                    ?>
                  

                                </select>
                                <div class="invalid-feedback">
                                    Please Enter valid inputs.
                                </div>
                            </div>
                            <div class="form-floating mb-3 col-4">
                                <input type="number" class="form-control" id="rate" placeholder="Rate/hr" required>
                                <label class="ms-2" for="floatingInput">Rate/hr</label>
                                <div class="invalid-feedback">
                                    Please Enter valid inputs.
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" id="saveEmployeeBtn" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="add-time" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="standard-modalLabel">Time Management</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card" id="user-update">
                        Loading...
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
    $('#appenTable').DataTable({
        ajax: {
            type: "POST",
            url: "functions/employee-management/get-employee-list.php"
        },
        error: function () {
            $("#appenTable").append(
                '<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
            );
        }
    });
    
});

function open_modal(id) {
        $("#add-time").modal("show");

        $.post(
            "functions/employee-management/employee-time-modal.php",
            {
                id: id,
            },
            function (data) {
                $("#user-update").html(data);
            }
        );
    }


</script>