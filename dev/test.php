<?php
//const ROOT = __DIR__ . "/..";
//
//require ROOT . "/functions/require.php";
//
//
//$companyId = 31870451;
//
//
//
//$contactsUnix = null;
//$leadsUnix = null;
//// получаем компанию по id с контактами по ее id
//$companyContacts = getEntity($companyId, "contacts");
//// получаем компанию по id с лидами по ее id
//$companyLeads = getEntity($companyId, "leads");
//
//// если у компании не пустой массив с контактами
//
//if(!empty($companyContacts["_embedded"]["contacts"])) {
//
//    $companyContacts = $companyContacts["_embedded"]["contacts"];
////    передается массив с контактами в функцию, там по каждому контакту ищется последняя выполненная задача
//    $contactsUnix = chooseTask($companyContacts, CRM_ENTITY_CONTACT);
//
//
//
//}
//
//
//
//
//if(!empty($companyLeads["_embedded"]["leads"])) {
//// аналогично
//    $companyLeads = $companyLeads["_embedded"]["leads"];
//// вернет либо пустой массив, либо с юниксом
//    $leadsUnix = chooseTask($companyLeads, CRM_ENTITY_LEAD);
//
//
//
//}
//
//
//// выбираем самую последнюю завершенную задачу (максимальное число) из двух массивов с задачами на контактах и задачами на лидах в зависимости от условий
//if(!empty($contactsUnix) && !empty($leadsUnix)) {
//
//    $contactsUnix = max($contactsUnix);
//    $leadsUnix = max($leadsUnix);
//
//    $resUnix = max($contactsUnix, $leadsUnix);
//
//    putContents($companyId, $resUnix);
//
//} else if(!empty($contactsUnix) && empty($leadsUnix)) {
//
//    $resUnix = max($contactsUnix);
//    putContents($companyId, $resUnix);
//
//
//} else if(empty($contactsUnix) && !empty($leadsUnix)) {
//
//    $resUnix = max($leadsUnix);
//    putContents($companyId, $resUnix);
//
//
//
//
//}
//
//
//
//
//
//
//
//
//
//
//
//
