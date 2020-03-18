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
		<li class="breadcrumb-item active" aria-current="page">3. Бюджетирование</li>
	</ol>
</nav>

<div class="row">
  <div class="col-sm-3">
		<div class="card shadow text-center" style="width: 22rem;">
			<div class="card-body">
				<h5 class="card-title">Занятие 1.1</h5>
					<video width="300" height="200" controls="controls"> <source src="/video/files/learning_excel/3/video/1.1.mp4"> </video>
			</div>
		</div>
	</div>
	<div class="col-sm-3">		
		<div class="card shadow text-center" style="width: 22rem;">
			<div class="card-body">
				<h5 class="card-title">Занятие 1.2</h5>
					<video width="300" height="200" controls="controls"> <source src="/video/files/learning_excel/3/video/1.2.mp4"> </video>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card shadow text-center" style="width: 22rem;">
			<div class="card-body">
				<h5 class="card-title">Занятие 2</h5>
					<video width="300" height="200" controls="controls"> <source src="/video/files/learning_excel/3/video/2.mp4"> </video>
			</div>
		</div>
	</div>	
	<div class="col-sm-3">
		<div class="card shadow text-center" style="width: 22rem;">
			<div class="card-body">
				<h5 class="card-title">Занятие 3</h5>
					<video width="300" height="200" controls="controls"> <source src="/video/files/learning_excel/3/video/3.mp4"> </video>
			</div>
		</div>
	</div>
</div>
<div class="row mt-3">
  <div class="col-sm-3">
		<div class="card shadow text-center" style="width: 22rem;">
			<div class="card-body">
				<h5 class="card-title">Занятие 4</h5>
					<video width="300" height="200" controls="controls"> <source src="/video/files/learning_excel/2/video/4.mp4"> </video>
			</div>
		</div>
	</div>
	<div class="col-sm-3">		
		<div class="card shadow text-center" style="width: 22rem;">
			<div class="card-body">
				<h5 class="card-title">Занятие 5</h5>
					<video width="300" height="200" controls="controls"> <source src="/video/files/learning_excel/2/video/5.mp4"> </video>
			</div>
		</div>
	</div>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>