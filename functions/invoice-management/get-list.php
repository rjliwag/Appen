<?php 
include "../../conn.php";

$requestData = $_REQUEST;

$columns = array(
    0 => 'full_name',
    1 => 'project_assign',
    2 => 'rate',
    3 => 'total_income',
    4 => 'month',
    5 => 'status',
    6 => ''
);
$get_total = $mysqli->query("SELECT * FROM $database.employee_management");
$total_data = mysqli_num_rows($get_total);
$total_filtered = $total_data;
$sql = "SELECT * FROM $database.employee_management";

if (!empty($requestData['search']['value'])) {
    $sql .= " WHERE (";
    $sql .= " first_name LIKE '%" . $requestData['search']['value'] . "%' ";
    $sql .= " OR last_name LIKE '%" . $requestData['search']['value'] . "%'";
    $sql .= " OR email_address LIKE '%" . $requestData['search']['value'] . "%'";
    $sql .= ")";
}
$sql_query = $mysqli->query($sql);
$totalFiltered = mysqli_num_rows($sql_query); 

if(isset($requestData['order'])) {
    $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
}

$sql_query = $mysqli->query($sql);

$data = [];




while($row = $sql_query->fetch_array()) {
    $nestedData = array();
    $nestedData[] = $row["first_name"] . " " .$row["last_name"];
    $nestedData[] = $row["project_assign"];
    $nestedData[] = $row["rate"];
    

//------------total Income -------------
$id = $row['id'];
$totalIncome = 0;
$income_sql = $mysqli->query("SELECT income FROM appen_management.time_management WHERE id = '$id'");
if ($income_sql->num_rows > 0) {
    // Loop through each row
    while ($income_row = $income_sql->fetch_assoc()) {
        // Add the income value to the total
        $totalIncome += $income_row['income'];
    }
}

// ---------------------------------


    $nestedData[] = strval($totalIncome);
   
    


    $btn  = "<div class='btn-action_wrap d-flex justify-content-center'>";
    $btn .= "<button class='btn btn-dark p-2' data-status='APPROVED' onclick='open_modal(".$row["id"].")'><i class='fa-regular fa-square-plus fa-sm'></i></button>";
    $btn .= "</div>";

    $nestedData[] = $btn;

    $data[] = $nestedData;
}

$json_data = array(
    "recordsTotal" => intval($total_data),
    "recordsFiltered" => intval($totalFiltered),
    "data" => $data
);

echo json_encode($json_data);
?>
