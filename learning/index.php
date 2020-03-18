<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Обучение");
use Bitrix\Main\UI\Extension;
Extension::load('ui.bootstrap4');
?>

<? $APPLICATION->includeComponent("bitrix:spotlight", "", array(
	"ID" => "card-control_learning_antimonpol1",
	"JS_OPTIONS" => array(
		"targetElement" => "card-control_learning_antimonpol",
		"content" => "Новый раздел",
		"targetVertex" => "middle-right"
	)
));
?>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<link href="style.css" rel="stylesheet">

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Главная</a></li>
		<li class="breadcrumb-item active" aria-current="page">Обучение</li>
	</ol>
</nav>
<div id="card">
	<div class="pl_container">
		<div class="row">
			<div class="" v-for="card in cards">
				<a class="btn btn-light" data-toggle="collapse" :href="'#' + card.parent" role="button" aria-expanded="false" aria-controls="learning">
					<div class="pl_card pl_card_learn">
						<img :src="'./' + card.parent + '/img.jpg'" class="image">
						<h5 class="pl_text">{{ card.name }}</h5>
					</div>
				</a>
				<div class="col">
					<div class="collapse" :id="card.parent">
						<div class="list-group">
							<card-item-list v-if="card.id == 0" v-for="item in items" :item="item" :key="item.id"></card-item-list>
							<card-item-list v-if="card.id == 1" v-for="item in items1" :item="item" :key="item.id"></card-item-list>
							<card-item-list v-if="card.id == 2" v-for="item in items2" :item="item" :key="item.id"></card-item-list>
							<card-item-list v-if="card.id == 3" v-for="item in items3" :item="item" :key="item.id"></card-item-list>
							<card-item-list v-if="card.id == 4" v-for="item in items4" :item="item" :key="item.id"></card-item-list>
							<card-item-list v-if="card.id == 5" v-for="item in items5" :item="item" :key="item.id"></card-item-list>
							<card-item-list v-if="card.id == 6" v-for="item in items6" :item="item" :key="item.id"></card-item-list>
							<card-item-list v-if="card.id == 7" v-for="item in items7" :item="item" :key="item.id"></card-item-list>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="script.js"></script>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>