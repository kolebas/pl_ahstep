<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$ELEMENT_ID = $_POST['ELEMENT_ID'];
	$IBLOCK_ID = '3';
	
	if(CIBlock::GetPermission($IBLOCK_ID)>='W')
	{
		$DB->StartTransaction();
		if(!CIBlockElement::Delete($ELEMENT_ID))
		{
			$strWarning .= 'Error!';
			$DB->Rollback();
		}
		else
        $DB->Commit();
		$em = $GLOBALS["USER"]->GetEmail();
		$post = http_build_query(
		array(
		'name' => $em,
		'text' => '',
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