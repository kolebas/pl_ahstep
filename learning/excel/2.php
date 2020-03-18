<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Обучение Excel");
use Bitrix\Main\UI\Extension;
Extension::load('ui.bootstrap4');
?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Главная</a></li>
		<li class="breadcrumb-item"><a href="/ahstep/learning/">Обучение</a></li>
		<li class="breadcrumb-item"><a href="#">Обучение Excel</a></li>
		<li class="breadcrumb-item active" aria-current="page">2. Excel и Финансы - расширенные инструменты</li>
	</ol>
</nav>

<div class="row">
  <div class="col-sm-3">
		<div class="card shadow text-center" style="width: 22rem;">
			<div class="card-body">
				<h5 class="card-title">Занятие 5</h5>
					<video width="300" height="200" controls="controls"> <source src="/video/files/learning_excel/2/video/5.mp4"> </video>
			</div>
		</div>
	</div>
	<div class="col-sm-3">		
		<div class="card shadow text-center" style="width: 22rem;">
			<div class="card-body">
				<h5 class="card-title">Занятие 6</h5>
					<video width="300" height="200" controls="controls"> <source src="/video/files/learning_excel/2/video/6.mp4"> </video>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card shadow text-center" style="width: 22rem;">
			<div class="card-body">
				<h5 class="card-title">Занятие 7</h5>
					<video width="300" height="200" controls="controls"> <source src="/video/files/learning_excel/2/video/7.mp4"> </video>
			</div>
		</div>
	</div>	
	<div class="col-sm-3">
		<div class="card shadow text-center" style="width: 22rem;">
			<div class="card-body">
				<h5 class="card-title">Занятие 8</h5>
					<video width="300" height="200" controls="controls"> <source src="/video/files/learning_excel/2/video/8.mp4"> </video>
			</div>
		</div>
	</div>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>