<?php

const ROOT = __DIR__;

require ROOT . "/functions/require.php";



$json = file_get_contents(ROOT."/completeTasks.json");


$data = json_decode($json, true);



$mysqli = mysqli_connect("localhost", "", "", "");



if (!$mysqli) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

foreach ($data as $value) {


    $company_id = $value['companyId'];
    $unixTime = $value['unixTime'];


    $sql = "SELECT * FROM auto_tasks WHERE company_id = '$company_id'";

    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Обновляем значение в другой колонке
        $sql = "UPDATE auto_tasks SET last_task_with_result = '$unixTime' WHERE company_id = '$company_id'";
        if (!mysqli_query($mysqli, $sql)) {
            echo "Failed to update data: " . mysqli_error($mysqli);
            exit();
        } else {
            echo "Data updated successfully.";
        }
    } else {
        $sql = "INSERT INTO auto_tasks (company_id, last_task_with_result) VALUES ('$company_id', '$unixTime')";
        if (!mysqli_query($mysqli, $sql)) {
            echo "Failed to insert data: " . mysqli_error($mysqli);
            exit();
        } else {
            echo "Data inserted successfully.";
        }
    }










}


mysqli_close($mysqli);













