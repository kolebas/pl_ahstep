<?
require_once($_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php');
$pl_users = Array();
$filter = Array
(
    "ACTIVE" => "Y",
    "LAST_NAME" => " _% ",
    "ID" => "1940",
    "EXTERNAL_AUTH_ID" => "LDAP#1",
 
);
$rsUsers = CUser::GetList(($by="last_name"), ($order="asc"), $filter, Array("NAME"));
   while($arUser = $rsUsers->Fetch())
   {
     array_push($pl_users, $arUser);
   };
header('Content-Type: application/json; charset=utf-8');
echo json_encode($pl_users);
?>