<script src="/ahstep/slider/main.js"></script>
<script src="/ahstep/slider/jquery.min.js"></script>
<script src="/ahstep/slider/owl.carousel.js"></script>

<link rel="stylesheet" href="/ahstep/slider/owl.carousel.min.css">
<link rel="stylesheet" href="/ahstep/slider/owl.theme.default.min.css">
<link rel="stylesheet" href="/ahstep/slider/slider.css">
<link href="/ahstep/style.css" rel="stylesheet">

<div class="sidebar-widget sidebar-widget-bp sidebar-widget-title-only pl_widget" style="min-height: 400px;">
	<div class="sidebar-widget-top sidebar-widget-top-only">
		 <a href="https://portal.ahstep.ru/about/spasibo.php?bitrix_include_areas=Y&clear_cache=Y">
			<div valign="middle" style="background-color:#0cbaee" class="sidebar-widget-top-title">
		 		<img src="https://portal.ahstep.ru/upload/medialibrary/516/gift_87166.png" valign="middle" width="33" height="33"> 
		 		<span style="position:absolute">&nbsp;&nbsp;Сказать спасибо</span>
			</div>
		 </a>
	</div>

	<?
		//подключаюсь к БД--------------------------------------
		$link = mysqli_connect("server168.hosting.reg.ru", "u0368567_web", "0Z6m8U0x", "u0368567_bitrix");
		$link->set_charset("utf8");

		if (!$link) {
		    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
		    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
		    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}

		$arUsers = $link->query("SELECT * FROM `thanks` ORDER BY `id` DESC");

		//собрал массив для слайдера--------------------------------------------
		foreach ($arUsers as $value) {
			//получаю пользователя
			$filter = Array("ID" => $value['user_id'], "ACTIVE" => "Y");
			$vUser = CUser::GetList(($by="personal_country"), ($order="desc"), $filter);
			$vUser = $vUser->Fetch();

			//получаю овнера
			$filter = Array("ID" => $value['owner_id'], "ACTIVE" => "Y");
			$vOwner = CUser::GetList(($by="personal_country"), ($order="desc"), $filter);
			$vOwner = $vOwner->Fetch();

			$slUsers['u_id'][] = $vUser[ID];
			$slUsers['u_name'][] = $vUser[NAME];
		  	$slUsers['u_last_name'][] = $vUser[LAST_NAME];
		  	$slUsers['u_photo'][] = CFile::ShowImage($vUser['PERSONAL_PHOTO'], 'border=0', '', true);
		  	$slUsers['u_like'][] = $value['type'];

		  	$slUsers['o_id'][] = $vOwner[ID];
		  	$slUsers['o_name'][] = $vOwner[NAME];
		  	$slUsers['o_last_name'][] = $vOwner[LAST_NAME];
		  	$slUsers['o_photo'][] = CFile::ShowImage($vOwner['PERSONAL_PHOTO'], 98, 98, 'border=0', '', true);
		}

		//вывод слайдера
		echo '<div class="owl-carousel owl-theme">';
		for ($i=0; $i < count($slUsers['u_photo']); $i++) { 
			if ($slUsers['u_photo'][$i] == NULL){$uImg = '<img src="https://portal.ahstep.ru/bitrix/templates/bitrix24/images/user-default-avatar.svg">';} else {$uImg = $slUsers['u_photo'][$i];}

			if ($slUsers['o_photo'][$i] == NULL){$oImg = '<img src="https://portal.ahstep.ru/bitrix/templates/bitrix24/images/user-default-avatar.svg">';} else {$oImg = $slUsers['o_photo'][$i];}

			if ($slUsers['u_like'][$i] == 'Успех'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-thumbsup"></span>';}
			if ($slUsers['u_like'][$i] == 'Подарок'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-gift"></span>';}
			if ($slUsers['u_like'][$i] == 'Кубок'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-cup"></span>';}
			if ($slUsers['u_like'][$i] == 'Деньги'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-money"></span>';}
			if ($slUsers['u_like'][$i] == 'Корона'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-crown"></span>';}
			if ($slUsers['u_like'][$i] == 'Коктейль'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-drink"></span>';}
			if ($slUsers['u_like'][$i] == 'Торт'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-cake"></span>';}
			if ($slUsers['u_like'][$i] == '1 место'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-thefirst"></span>';}
			if ($slUsers['u_like'][$i] == 'Флаг'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-flag"></span>';}
			if ($slUsers['u_like'][$i] == 'Звезда'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-star"></span>';}
			if ($slUsers['u_like'][$i] == 'Сердце'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-heart"></span>';}
			if ($slUsers['u_like'][$i] == 'Пиво'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-beer"></span>';}
			if ($slUsers['u_like'][$i] == 'Цветы'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-flowers"></span>';}
			if ($slUsers['u_like'][$i] == 'Улыбка'){$typeLike = '<span class="feed-add-grat-box feed-add-grat-medal-smile"></span>';}

		    echo '<div class="item">';
		    	echo '<div class="uname"><a href="/company/personal/user/'.$slUsers['u_id'][$i].'/">'.$slUsers['u_last_name'][$i].'<br>'.$slUsers['u_name'][$i].'</a></div>';
	        	echo $uImg;
	        	echo '<div class="typeLile">'.$typeLike.'</div>';
	        	echo '<div class="oimg">'.$oImg.'</div>';
	          	echo '<div class="oname"> От <a href="/company/personal/user/'.$slUsers['u_id'][$i].'/">'.$slUsers['o_last_name'][$i].' '.$slUsers['o_name'][$i].'</a></div>';
	        echo '</div>';
		}
		echo "</div>";
	?>
</div>

<script>
	$(document).ready(function() {
	  var owl = $('.owl-carousel');
	  owl.owlCarousel({
	    items: 1,
	    loop: true,
	    margin: 10,
		dots: false,
		nav: true,
	    autoplay: true,
		smartSpeed:1000,
	    autoplayTimeout: 10000,
	    autoplayHoverPause: false
	  });
	  $('.play').on('click', function() {
	    owl.trigger('play.owl.autoplay', [1000])
	  })
	  $('.stop').on('click', function() {
	    owl.trigger('stop.owl.autoplay')
	  })
	})
</script>


