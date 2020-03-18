<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$fld_name = $_POST['fld_name'];
	$bp_user = $_POST['bp_user'];
	$info= $_POST['info'];
	
	$cnt = CIBlockElement::GetList(
    array(),
    array('IBLOCK_ID' => 89),
    array(),
    false,
    array('ID', 'NAME')
	); 
	
	$cnt = $cnt + '1';
	
	CModule::IncludeModule('bizproc');
	$documentId = CBPVirtualDocument::CreateDocument(
    0,
    array(
	"IBLOCK_ID" => 89,
	"NAME" => $fld_name,
	"CREATED_BY" => "user_".$GLOBALS["USER"]->GetID(),
    )
	);
	
	$arErrorsTmp = array();
	
	$wfId = CBPDocument::StartWorkflow(
	320,
    array("bizproc", "CBPVirtualDocument", $documentId),
    array_merge(array("cn"=>$fld_name, "body"=>$info, "bu"=>$bp_user, "cnt"=>$cnt ), array("TargetUser" => "user_".intval($GLOBALS["USER"]->GetID()),
	CBPDocument::PARAM_DOCUMENT_EVENT_TYPE =>
	CBPDocumentEventType::Manual)),
    $arErrorsTmp
	);
	echo "test";
	
	$cnt = CIBlockElement::GetList(
    array(),
    array('IBLOCK_ID' => 89),
    array(),
    false,
    array('ID', 'NAME')
	); 
	
?>