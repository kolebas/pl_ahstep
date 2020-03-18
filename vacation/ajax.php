<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$zam = $_POST['zam'];
	if ($_POST['zam'] != NULL){
			$zam_set = '"zam"=>' . $_POST['zam'];
	}
	$start = $_POST['start'];
	$finish = $_POST['finish'];
	$type = $_POST['type'];
	$text = $_POST['text'];
	$us =$GLOBALS["USER"]->GetFullName();
	
	CModule::IncludeModule('bizproc');
	$documentId = CBPVirtualDocument::CreateDocument(
    0,
    array(
	"IBLOCK_ID" => 90,
	#"NAME" => 'test',
	"NAME" => $us . ' (' . $type . ' C ' . $start . ' По ' . $finish . ')',
	"CREATED_BY" => "user_".$GLOBALS["USER"]->GetID(),
    )
	);
	
	$arErrorsTmp = array();
	
	$wfId = CBPDocument::StartWorkflow(
	323,
    array("bizproc", "CBPVirtualDocument", $documentId),
    array_merge(array("type"=>$type, "zam"=>$zam, "start"=>$start, "finish"=>$finish, "text"=>$text), array("TargetUser" => "user_".intval($GLOBALS["USER"]->GetID()),
	CBPDocument::PARAM_DOCUMENT_EVENT_TYPE =>
	CBPDocumentEventType::Manual)),
    $arErrorsTmp
	);
	if ($text != NULL) {
		//Отправка файла автоматического ответа на сервер электронной почты
		$em = $GLOBALS["USER"]->GetEmail();
		$post = http_build_query(
		array(
		'name' => $em,
		'text' => '[TYPE]' . $type . PHP_EOL . '[ANSWER]' . $text . ';',
		) 
		);
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_POST => 1,
		CURLOPT_HEADER => 0,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'https://webmail.ahstep.ru/postfixadmin/postsieve.php',
		CURLOPT_POSTFIELDS => $post,
		));
		$result = curl_exec($curl);
	}
	
	header("Location: ../vacation/index.php"); exit();
	
?>