<?php


function chooseTask(array $entityArray, string $entity): array {

    $returnedArray = [];

    foreach ($entityArray as $array) {


        $tasks = getTasks($entity, $array["id"]);


        if(!empty($tasks["_embedded"]["tasks"])) {


            $tasks = $tasks["_embedded"]["tasks"];
            $lastTask = end($tasks);
            $returnedArray[] = $lastTask["updated_at"];




        }



    }

    return $returnedArray;





}



function putContents(int $companyId, int $unixTime) {



        $taskToJson = file_get_contents(ROOT . "/completeTasksTest.json");
        $taskToJson = json_decode($taskToJson, true);

        $taskToJson[] = ["companyId" => $companyId, "unixTime" => $unixTime];


        $taskToJson = json_encode($taskToJson);
        file_put_contents(ROOT . "/completeTasksTest.json", $taskToJson);





}









