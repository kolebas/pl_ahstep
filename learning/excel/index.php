<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Обучение Excel");
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</style> <nav>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="#">Главная</a></li>
	<li class="breadcrumb-item"><a href="#">Обучение</a></li>
	<li class="breadcrumb-item active" aria-current="page">Обучение Excel</li>
</ol>
 </nav>

<div class="card ml-4">
	<h5 class="card-header">Разделы обучения</h5>
		<div class="card-body">


<div class="list-group ml-4 " style="width: 38rem;">
  <a href="./1.php" class="list-group-item list-group-item-action mt-2">1. Excel и Финансы - базовые инструменты и функции</a>
</div>

<div class="list-group ml-4 mt-1" style="width: 38rem;">
  <a href="./2.php" class="list-group-item list-group-item-action">2. Excel и Финансы - расширенные инструменты</a>
</div>
<div class="list-group ml-4 mt-1" style="width: 38rem;">
  <a href="./3.php" class="list-group-item list-group-item-action">3. Бюджетирование</a>
</div>
<div class="list-group ml-4 mt-1" style="width: 38rem;">
  <a href="./4.php" class="list-group-item list-group-item-action">4. Визуализация в Excel</a>
</div>
<div class="list-group ml-4 mt-1" style="width: 38rem;">
  <a href="./5.php" class="list-group-item list-group-item-action">5. Макросы</a>
		</div>
 </div>
 <div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>