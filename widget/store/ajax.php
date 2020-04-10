<?
require_once($_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php');


$postData = file_get_contents('php://input');
$data = json_decode($postData, true);
$input1 = $data["input1"];

//var_dump($data["firstName"]);
//print_r($data["firstName"]);
//print_r($data["test2"]);
echo $cmnt;

$cnt = CIBlockElement::GetList(
    array(),
    array('IBLOCK_ID' => 85),
    array(),
    false,
    array('ID', 'NAME')
); 
 $cnt = $cnt + '1';
 
 CModule::IncludeModule('bizproc');
	  $documentId = CBPVirtualDocument::CreateDocument(
    0,
    array(
        "IBLOCK_ID" => 85,
	    "NAME" => $cnt,
        "CREATED_BY" => "user_".$GLOBALS["USER"]->GetID(),
    )
   );

   $arErrorsTmp = array();

   $wfId = CBPDocument::StartWorkflow(
   294,
    array("bizproc", "CBPVirtualDocument", $documentId),
    array_merge(array("cmnt"=>$input1, "cnt"=>$cnt), array("TargetUser" => "user_".intval($GLOBALS["USER"]->GetID()),
	CBPDocument::PARAM_DOCUMENT_EVENT_TYPE =>
	CBPDocumentEventType::Manual)),
    $arErrorsTmp
   );

?>