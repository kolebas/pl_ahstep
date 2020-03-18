<?
#require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
#$APPLICATION->SetTitle("Заявки");

#use Bitrix\Main\UI\Extension;

#Extension::load('ui.bootstrap4');
?>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Главная</a></li>
		<li class="breadcrumb-item active" aria-current="page">Заявки</li>
	</ol>
</nav>

<link href="style-index.css" rel="stylesheet">

<?
$class_active = 'class="list-group-item list-group-item-action active" href="/it-uslugi/index.php#" align="center"';
$class_dd = 'class="list-group-item list-group-item-action dropdown-toggle"';
$ts001 = '<a class="list-group-item list-group-item-action" href="uslugi/ts-001.php?clear_cache=Y"><img src="/upload/resize_cache/iblock/ff3/36_30_1/term.png">&nbsp; &nbsp;Заявка на терминал</a>';
$nc002 = '<a class="list-group-item list-group-item-action" href="uslugi/nc-002.php?clear_cache=Y"><img src="/upload/resize_cache/iblock/09a/36_30_1/folder_add.png">&nbsp; &nbsp;Создание нового каталога (папки)</a>';
$nc003 = '<a class="list-group-item list-group-item-action" href="./ahstep/request/nc-003/><img src="/upload/resize_cache/iblock/c8a/36_30_1/folder_rep.png">&nbsp; &nbsp;Доступ к каталогу (папке)</a>';
$ml001 = '<a class="list-group-item list-group-item-action" href="uslugi/ml-001.php?clear_cache=Y"><img src="/upload/resize_cache/iblock/d62/36_30_1/mails.png">&nbsp; &nbsp;Создание/Изменение адреса почтовой рассылки</a>';
$nu001_ = '<a class="list-group-item list-group-item-action" href="uslugi/nu-001.php"><img src="/upload/resize_cache/iblock/f1d/36_30_1/user_add.png">&nbsp; &nbsp;Новый пользователь</a>';
$nu001 = '<button class="list-group-item list-group-item-action" type="button" data-toggle="modal" data-target="#nu-001"><img src="/upload/resize_cache/iblock/f1d/36_30_1/user_add.png">&nbsp; &nbsp;Новый пользователь</button>';
$ph001 = '<a class="list-group-item list-group-item-action" href="uslugi/ph-001.php?clear_cache=Y&#10;"><img src="/upload/resize_cache/iblock/2bb/36_30_1/sim_add.png">&nbsp; &nbsp;Служебная сотовая связь</a>';
$ns001 = '<a class="list-group-item list-group-item-action" href="uslugi/ns-001.php?clear_cache=Y"><img src="/upload/resize_cache/iblock/fd1/36_30_1/vpn.png">&nbsp; &nbsp;Удаленный доступ (VPN)</a>';
$ar001 = '<a class="list-group-item list-group-item-action" href="uslugi/ar-001.php?clear_cache=Y"><img src="/upload/resize_cache/iblock/1e5/36_30_1/user_del.png">&nbsp; &nbsp;Отключение доступов</a>';
$_1c001 = '<a class="list-group-item list-group-item-action" href="uslugi/1c-001.php?clear_cache=Y"><img src="/upload/resize_cache/iblock/b3f/36_30_1/1s_kartinki_1_19082824.png">&nbsp; &nbsp;Предоставление доступа к 1С </a>';
$_1c002 = '<a class="list-group-item list-group-item-action" href="uslugi/1c-002.php?clear_cache=Y"><img src="/upload/resize_cache/iblock/b3f/36_30_1/1s_kartinki_1_19082824.png">&nbsp; &nbsp;Запрос на доработку 1С </a>';
$ws001 = '<a class="list-group-item list-group-item-action" href="uslugi/nu-001.php"><img src="/upload/resize_cache/iblock/8d0/36_30_1/computer_add.png">&nbsp; &nbsp;Закупка техники/программного обеспечения  </a>';
$sf001 = '<a class="list-group-item list-group-item-action" href="uslugi/ph-001.php?clear_cache=Y&#10;"><img src="/upload/resize_cache/iblock/a10/36_30_1/soft.png">&nbsp; &nbsp;Заявка на программное обеспечение </a>';
$nsi001_ = '<a class="list-group-item list-group-item-action" href="uslugi/nsi-001.php"><img src="img/lists.png">&nbsp; &nbsp;Редактирование справочника номенклатура  </a>';
$nsi001 = '<button class="list-group-item list-group-item-action" type="button" data-toggle="modal" data-target="#nsi-001"><img src="img/lists.png">&nbsp; &nbsp;Редактирование справочника номенклатура </button> ';
$adm001 = '	<td>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	</td>
	<td width="400" valign="top"><a class="list-group-item list-group-item-action active" href="/it-uslugi/index.php#" align="center" >Администрирование</a>
	<a class="list-group-item list-group-item-action dropdown-toggle" href="it-uslugi/uslugi/soglasovanie-izmeneniy.php?clear_cache=Y"><img src="/upload/resize_cache/iblock/a42/36_30_1/rfc.png">&nbsp; &nbsp;RFC</a>
	<a class="list-group-item list-group-item-action dropdown-toggle" href="/bizproc/processes/87/view/0/?list_section_id="><img src="/upload/resize_cache/iblock/6f7/36_30_1/folders.png">&nbsp; &nbsp;Список СФК</a>
	<a class="list-group-item list-group-item-action dropdown-toggle" href="/bizproc/processes/67/view/0/?list_section_id="><img src="/upload/resize_cache/iblock/680/36_30_1/org.png">&nbsp; &nbsp;Список организаций</a>
	</td>';
?>
<br>
<div class="list-group test2">
	<table>
		<tbody>
			<tr>

				<a class="list-group-item list-group-item-action" data-toggle="collapse" href="#nsi" role="button" aria-expanded="false" aria-controls="collapseExample ">
					<h6 class="mb-1"><img src="img/list.png">&nbsp;&nbsp;Нормативно-справочная информация</h6>
				</a>
				<div class="collapse" id="nsi">
					<div class="card card-body">
						<a href="uslugi/nsi-001.php" class="list-group-item list-group-item-action"><img src="img/lists.png">&nbsp; &nbsp;Редактирование справочника номенклатуры</a>
					</div>
				</div>
				<a class="list-group-item list-group-item-action" data-toggle="collapse" href="#user" role="button" aria-expanded="false" aria-controls="collapseExample ">
					<h6 class="mb-1"><img src="img/user.png">&nbsp; &nbsp;Заявки пользователя</h6>
				</a>
				<div class="collapse" id="user">
					<div class="card card-body">
						<a href="uslugi/nu-001.php" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/f1d/36_30_1/user_add.png">&nbsp; &nbsp;Новый пользователь</a>
						<a href="uslugi/ns-001.php?clear_cache=Y" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/fd1/36_30_1/vpn.png">&nbsp; &nbsp;Удаленный доступ (VPN)</a>
						<a href="uslugi/ph-001.php?clear_cache=Y" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/2bb/36_30_1/sim_add.png">&nbsp; &nbsp;Служебная сотовая связь</a>
						<a href="uslugi/ar-001.php?clear_cache=Y" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/1e5/36_30_1/user_del.png">&nbsp; &nbsp;Отключение доступов</a>
					</div>
				</div>
				<a class="list-group-item list-group-item-action" data-toggle="collapse" href="#_1с" role="button" aria-expanded="false" aria-controls="collapseExample ">
					<h6 class="mb-1"><img src="/upload/resize_cache/iblock/b3f/36_30_1/1s_kartinki_1_19082824.png">&nbsp; &nbsp;Заявки 1С</h6>
				</a>
				<div class="collapse" id="_1с">
					<div class="card card-body">
						<a href="uslugi/1c-001.php?clear_cache=Y" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/b3f/36_30_1/1s_kartinki_1_19082824.png">&nbsp; &nbsp;Предоставление доступа 1С</a>
						<a href="uslugi/1c-002.php?clear_cache=Y" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/b3f/36_30_1/1s_kartinki_1_19082824.png">&nbsp; &nbsp;Запрос на доработку 1С</a>
					</div>
				</div>
				<a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample ">
					<h6 class="mb-1"><img src="/upload/resize_cache/iblock/a10/36_30_1/soft.png">&nbsp; &nbsp;Заявки на закупку</h6>
				</a>
				<div class="collapse" id="collapseExample">
					<div class="card card-body">
						<a href="uslugi/ws-001.php" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/8d0/36_30_1/computer_add.png">&nbsp; &nbsp;Закупка техниики/оборудования обеспечения</a>
						<a href="uslugi/sf-001.php" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/a10/36_30_1/soft.png">&nbsp; &nbsp;Заявки на программное обеспечение</a>
					</div>
				</div>
				<a class="list-group-item list-group-item-action" data-toggle="collapse" href="#fldr" role="button" aria-expanded="false" aria-controls="collapseExample ">
					<h6 class="mb-1"><img src="/upload/resize_cache/iblock/6f7/36_30_1/folders.png">&nbsp; &nbsp;Заявки на каталог (папку)</h6>
				</a>
				<div class="collapse" id="fldr">
					<div class="card card-body">
						<a href="uslugi/nc-002.php?clear_cache=Y" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/09a/36_30_1/folder_add.png">&nbsp; &nbsp;Создание нового каталога (папки)</a>
						<a href="../ahstep/request/nc-003/" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/c8a/36_30_1/folder_rep.png">&nbsp; &nbsp;Доступ к каталогу (папке)</a>
						<a href="../ahstep/request/nc-004/" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/09a/36_30_1/folder_add.png">&nbsp; &nbsp;Создание/изменение сетевого каталога (внешние сотрудники)</a>
					</div>
				</div>
				<a class="list-group-item list-group-item-action" data-toggle="collapse" href="#mail" role="button" aria-expanded="false" aria-controls="collapseExample ">
					<h6 class="mb-1"><img src="/upload/resize_cache/iblock/d62/36_30_1/mails.png">&nbsp; &nbsp;Почта&nbsp; &nbsp;</h6>
				</a>
				<div class="collapse" id="mail">
					<div class="card card-body">
						<a href="uslugi/ml-001.php?clear_cache=Y" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/d62/36_30_1/mails.png">&nbsp; &nbsp;Создание/Изменение адреса почтовой рассылки</a>
					</div>
				</div>
			</tr>
		</tbody>
	</table>
</div>
<br>
<div id="items" class="list-group pl_container">
	<div v-for="category in categories">
		<a :href="'#' + category.link" role="button" data-toggle="collapse" class="list-group-item list-group-item-action pl_button"><img :src=category.img> <span class="pl_text">{{ category.name }}</span></a>
	</div>
	<div class="collapse">
		<div class="card card-body">
			<a href="uslugi/nc-002.php?clear_cache=Y" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/09a/36_30_1/folder_add.png">&nbsp; &nbsp;Создание нового каталога (папки)</a>
			<a href="../ahstep/request/nc-003/" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/c8a/36_30_1/folder_rep.png">&nbsp; &nbsp;Доступ к каталогу (папке)</a>
			<a href="../ahstep/request/nc-004/" class="list-group-item list-group-item-action"><img src="/upload/resize_cache/iblock/09a/36_30_1/folder_add.png">&nbsp; &nbsp;Создание/изменение сетевого каталога (внешние сотрудники)</a>
		</div>
	</div>
</div>

<script>
	Vue.component('card-item', {
		props: ['card'],
		template: '<h5>{{ card.name }}</h5>'
	})
	Vue.component('card-item-list', {
		props: ['item'],
		template: '<a :href="item.lnk" class="list-group-item list-group-item-action mt-2">{{ item.name }}</a>'
	})

	var app = new Vue({
		el: '#items',
		data: {
			message: 'Собираем карточки, Vue!',
			categories: [{
					name: 'Нормативно-справочная информация',
					img: 'img/list.png',
					link: 'nsi'
				},
				{
					name: 'Заявки пользователя',
					img: 'img/user.png',
					link: 'user'
				},
				{
					name: 'Заявки 1С',
					img: '/upload/resize_cache/iblock/b3f/36_30_1/1s_kartinki_1_19082824.png',
					link: '_1с'
				},
				{
					name: 'Заявки на закупку',
					img: '/upload/resize_cache/iblock/a10/36_30_1/soft.png',
					link: 'collapseExample'
				},
				{
					name: 'Заявки на каталог (папку)',
					img: '/upload/resize_cache/iblock/6f7/36_30_1/folders.png',
					link: 'fldr'
				},
				{
					name: 'Почта',
					img: '/upload/resize_cache/iblock/d62/36_30_1/mails.png',
					link: 'mail'
				}
			]
		}
	})
</script>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>