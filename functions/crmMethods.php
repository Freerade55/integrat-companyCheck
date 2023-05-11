<?php


function getTasks(string $entity_type, int $id) {


    switch ($entity_type) {
        case CRM_ENTITY_CONTACT:
            $entity_type = "contacts";
            break;
        case CRM_ENTITY_LEAD:
            $entity_type = "leads";
            break;

        case CRM_ENTITY_COMPANY:
            $entity_type = "companies";
            break;



    }


    $query = [
        "filter" => [
        "entity_type" => $entity_type,
        "entity_id" => $id,
        "is_completed" => 1,
    ],

        "limit" => 210

    ];


    $link = "https://{$_ENV["SUBDOMAIN"]}.amocrm.ru/api/v4/tasks?" . http_build_query($query);

    $result = json_decode(connect($link), true);

    return $result;



}





function getEntity(int $id, string $with): array
{
    $link = "https://{$_ENV["SUBDOMAIN"]}.amocrm.ru/api/v4/companies/$id?with=$with&limit=210";



    $result = json_decode(connect($link), true);

    if (empty($result)) {
        return [];
    } else {
        return $result;
    }





}




function getCompany(int $id): array
{
    $link = "https://{$_ENV["SUBDOMAIN"]}.amocrm.ru/api/v4/companies/$id";



    $result = json_decode(connect($link), true);

    if (empty($result)) {
        return [];
    } else {
        return $result;
    }


}









