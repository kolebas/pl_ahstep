<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); 
$fld_name = $_POST['fld_name'];
$ar_rw_usr_all = explode (" ", $_POST['rw_usr_all']);
$ar_ro_usr_all = explode (" ", $_POST['ro_usr_all']);
$ar_rm_usr_all = explode (" ", $_POST['rm_usr_all']);
$cmnt = $_POST['cmnt'];


#$fld_name = '3';
#$bp_user = '2';
#$info= '1';

  $cnt = CIBlockElement::GetList(
    array(),
    array('IBLOCK_ID' => 73),
    array(),
    false,
    array('ID', 'NAME')
); 
 $cnt = $cnt + '1';
 
 CModule::IncludeModule('bizproc');
	  $documentId = CBPVirtualDocument::CreateDocument(
    0,
    array(
     "IBLOCK_ID" => 73,
	 "NAME" => $cnt,
     //"NAME" => $fld_name,
     "CREATED_BY" => "user_".$GLOBALS["USER"]->GetID(),
    )
   );

   $arErrorsTmp = array();

   $wfId = CBPDocument::StartWorkflow(
   197,
    array("bizproc", "CBPVirtualDocument", $documentId),
    array_merge(array("fld_name"=>$fld_name, "rw_usr"=>$ar_rw_usr_all, "ro_usr"=>$ar_ro_usr_all, "rm_usr"=>$ar_rm_usr_all, "cmnt"=>$cmnt, "cnt"=>$cnt), array("TargetUser" => "user_".intval($GLOBALS["USER"]->GetID()),
	CBPDocument::PARAM_DOCUMENT_EVENT_TYPE =>
	CBPDocumentEventType::Manual)),
    $arErrorsTmp
   );
   print_r($ar_rw_usr_all);
   print_r($ar_ro_usr_all);
   print_r($ar_rm_usr_all);
?>


	