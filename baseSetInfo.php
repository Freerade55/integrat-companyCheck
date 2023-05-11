<?php


const ROOT = __DIR__;

require ROOT . "/functions/require.php";



$mysqli = mysqli_connect("localhost", "u0574215_default", "1vLfr324", "u0574215_trandagent");
mysqli_set_charset($mysqli, "utf8");



if (!$mysqli) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}



$sql = "SELECT * FROM auto_tasks WHERE company_name IS NULL";
$result = mysqli_query($mysqli, $sql);

$result = mysqli_fetch_all($result, MYSQLI_ASSOC);
if(!empty($result)) {

    foreach ($result as $index => $row) {


        $rowId = $row["id"];
        $companyId = $row["company_id"];

        $company = getCompany($companyId);

        $company_name = $company["name"];
        $company_location = null;
        $resp_id = $company["responsible_user_id"];
        $group_id = $company["group_id"];


        if(!empty($company["custom_fields_values"])) {

            foreach ($company["custom_fields_values"] as $field) {

                if($field["field_id"] == 838497) {
                    $company_location = $field["values"][0]["value"];

                }

            }

        }


        $sql = "UPDATE auto_tasks SET 
            company_name = '$company_name',
            company_location = '$company_location',
            resp_id = '$resp_id',
            group_id = '$group_id'
            WHERE id = '$rowId'";


        if (!mysqli_query($mysqli, $sql)) {
            echo "Failed to update data $rowId: " . mysqli_error($mysqli);
        } else {
            echo "Data updated successfully.";
        }





    }

}


mysqli_close($mysqli);










