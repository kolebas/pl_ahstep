
<?php
	//для работы с сторонней бд
	$link = mysqli_connect("server168.hosting.reg.ru", "u0368567_web", "0Z6m8U0x", "u0368567_bitrix");
	$link->set_charset("utf8");

	if (!$link) {
	    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
	    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	$comment = $_POST['comment'];
	$user_id = $_POST['user_id'];
	$user_id = str_replace("U", "", $user_id );
	$owner_id = $_POST['owner_id'];
	$type_like = $_POST['type_like'];


	$link->query("INSERT INTO `u0368567_bitrix`.`thanks` (`id`, `owner_id`, `user_id`, `type`, `comment`, `created_at`) VALUES ('', '".$owner_id."', '".$user_id."', '".$type_like."', '".$comment."', CURRENT_TIMESTAMP);");

	mysqli_close($link);
?>

