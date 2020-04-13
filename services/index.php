<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Заявки");
use Bitrix\Main\UI\Extension;
Extension::load('ui.bootstrap4');
?>

<link href="style.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Главная</a></li>
		<li class="breadcrumb-item active" aria-current="page">Заявки</li>
	</ol>
</nav>
<br>
<div id="items" >
	<v-app>
		<v-content>
			<v-row
				justify="center"
					>
					<v-card
					class="mx-8 blue-grey lighten-5"
					max-width="750"
					>
						<v-card-text>
							<div>
								<p class="headline text--primary text-center">{{ title }}</p>
								<p style="line-height: 1.5;">
									{{ message }} <a href="../../../it-uslugi/helpdesk/my_ticket.php"><button id="btn_ticket" type="button" class="ui-btn ui-btn-xs">Мои заявки</button></a>
								</p>
							</div>
						</v-card-text>
						<div v-for="(category, key) in categories">
							<a :href="'#' + category.type"  role="button" data-toggle="collapse" :class="categoty_class"><img :src=category.img> <span class="pl_text">{{ category.name }}</span></a>
							<div class="collapse" :id="category.type">
								<div class="card card-body">
									<card-item-list v-for="item in items" v-if="item.type == category.type" :item="item" ></card-item-list>
								</div>
							</div>
						</div>
					</v-card>				
			</v-row>
		</v-content>		
	</v-app>
</div>

<script>
	Vue.component('category', {
		props: ['category'],
		template: `<div>
		<a :href="'#' + category.type" role="button" data-toggle="collapse" class="pl_categories list-group-item-action pl_button"><img :src=category.img> <span class="pl_text">{{ category.name }}</span></a>
		</div>
		<card-item-list v-for="item in items" :item="item">	</card-item-list>`
	})
	Vue.component('card-item-list', {
		props: ['item'],
		template: '<a :href="item.lnk" class="pl_categories list-group-item-action mt-2"><img :src="item.img"><span style="margin-left: 1rem;">{{ item.name }}</span></a>'
	})

	var app = new Vue({
		el: '#items',
		vuetify: new Vuetify(),
		data: {
			title: 'Заявки на доступ к ИТ услугам',
			categoty_class: 'pl_categories list-group-item-action pl_button',
			item_class: 'pl_categories list-group-item-action',
			message: 'Для получения доступа к сервису или услуге, выберите нужный раздел, а затем услугу, после заполнения необходимых полей формы заявка будет отправлена на согласование отвественных сотрудникам. Статус заявки вы можете отслеживать в разделе',
			path_service: '../../it-uslugi/uslugi/',
			dialog: false,
			type: '',			
			btn_text:'',
			categories: [{
					name: 'Нормативно-справочная информация',
					img: 'img/list.png',
					type: 'nsi'
				},
				{
					name: 'Заявки пользователя',
					img: 'img/user.png',
					type: 'user'
				},
				{
					name: 'Заявки 1С',
					img: 'img/1s.png',
					type: '_1с'
				},
				{
					name: 'Заявки на закупку',
					img: 'img/soft.png',
					type: 'buy_req'
				},
				{
					name: 'Заявки на каталог (папку)',
					img: 'img/folder_add.png',
					type: 'fldr'
				},
				{
					name: 'Почта',
					img: 'img/mails.png',
					type: 'mail'
				}
			],
			items: [{
					name: 'Редактирование справочника номенклатуры',
					img: 'img/lists.png',
					type: 'nsi',
					lnk: '../../it-uslugi/uslugi/nsi-001.php'
				},
				{
					name: 'Новый пользователь',
					img: 'img/user_add.png',
					type: 'user',
					lnk: '../../it-uslugi/uslugi/nu-001.php'
				},
				{
					name: 'Удаленный доступ (VPN)',
					img: 'img/vpn.png',
					type: 'user',
					lnk: '../../it-uslugi/uslugi/ns-001.php'
				},
				{
					name: 'Служебная сотовая связь',
					img: 'img/sim_add.png',
					type: 'user',
					lnk: '../../it-uslugi/uslugi/ph-001.php'
				},
				{
					name: 'Отключение доступов',
					img: 'img/user_del.png',
					type: 'user',
					lnk: '../../it-uslugi/uslugi/ar-001.php'
				},
				{
					name: 'Предоставление доступа к 1С',
					img: 'img/1s.png',
					type: '_1с',
					lnk: '../../it-uslugi/uslugi/1c-001.php'
				},
				{
					name: 'Запрос на доработку 1С',
					img: 'img/1s.png',
					type: '_1с',
					lnk: '../../it-uslugi/uslugi/1c-002.php'
				},
				{
					name: 'Закупка техники/оборудования/программного обеспечения',
					img: 'img/computer_add.png',
					type: 'buy_req',
					lnk: '../../it-uslugi/uslugi/ws-001.php'
				},
				{
					name: 'Установка прораммного обеспечения',
					img: 'img/soft.png',
					type: 'user',
					lnk: '../../it-uslugi/uslugi/sf-001.php'
				},
				{
					name: 'Создание нового каталога (папки)',
					img: 'img/folder_add.png',
					type: 'fldr',
					lnk: '../request/nc-002'
				},
				{
					name: 'Доступ к каталогу (папке)',
					img: 'img/folder_rep.png',
					type: 'fldr',
					lnk: '../request/nc-003'
				},
				{
					name: 'Создание.изменение сетевого каталога (внешние сотрудники)',
					img: 'img/folder_add.png',
					type: 'fldr',
					lnk: '../request/nc-004'
				},
				{
					name: 'Создание/изменение адреса почтовой рассылки',
					img: 'img/mails.png',
					type: 'mail',
					lnk: '../../it-uslugi/uslugi/ml-001.php'
				},
			],								
		},
		// Тестирование фильтрации
		/*computed:{
            filteredItems: function(){
                return this.items.filter(item => {
            		return item.type.includes(this.type);
                });
            }
		},*/
		//Тестирование функций
		/*methods:{
			category_type: function (prop) {
				console.log(prop);
				for (i = 0; i < this.items.length; i++){
					if(this.items[i].type == prop)
					{
						console.log(this.items[i].name)
					}
				}	
			} 
		}*/
	})
</script>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>