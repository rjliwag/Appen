<?php include ("header.php");
include ("nav-menu.php"); ?>



<div class="main-content mt-3 bg-light">
    <div class="bg-white border-bottom">
        <p class="h3 text-dark ms-3">Employee Management</p>
    </div>

    <div class="container mt-4">
        <?php include 'functions/employee-management/tab-menu.php'; ?>

        <div class="tab-content_wrap bg-white">
        <div class="dt-button_wrap position-absolute  end-0 mt-3 me-2">
            </div>
            
            <div class="row">
                <div class="col-sm-12 mt-3">
                    <h3 class="text-center">Invoice Management</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mt-2">
                    <div class="table-main_wrap table-with_actions">
                        <table id="appenTable" class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Project Assign</th>
                                    <th>Rate / hr</th>
                                    <th>Total Income</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

<div id="add-time" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="standard-modalLabel">Invoice</h4>
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

<script>
    $('#appenTable').DataTable({
        ajax: {
            type: "POST",
            url: "functions/invoice-management/get-list.php"
        },
        error: function () {
            $("#appenTable").append(
                '<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
            );
        }
});

function open_modal(id) {
        $("#add-time").modal("show");

        $.post(
            "functions/invoice-management/invoice-modal.php",
            {
                id: id,
            },
            function (data) {
                $("#user-update").html(data);
            }
        );
    }
</script>