	Vue.component('card-item', {
		props: ['card'],
		template: '<h5>{{ card.name }}</h5>'
	})
	Vue.component('card-item-list', {
		props: ['item'],
		template: '<a class="list-group-item list-group-item-action mt-2" :href="item.lnk" data-viewer="" data-viewer-type="document" :data-src="item.file" :data-title="item.name" data-viewer-group-by="folder_list">{{ item.name }}</a>'
	})

	var app = new Vue({
		el: '#card',
		data: {
			message: 'Собираем карточки, Vue!',
			items: [{
					parent: 0,
					name: 'Excel и Финансы - базовые инструменты и функции',
					lnk: './excel/1.php'
				},
				{
					parent: 0,
					name: 'Excel и Финансы - расширенные инструменты',
					lnk: './excel/2.php'
				},
				{
					parent: 0,
					name: 'Бюджетирование',
					lnk: './excel/3.php'
				},
				{
					parent: 0,
					name: 'Бюджетирование',
					lnk: './excel/4.php'
				},
				{
					parent: 0,
					name: 'Управление рисками',
					lnk: './excel/5.php'
				},
				{
					parent: 0,
					name: 'Макросы',
					lnk: './excel/6.php'
				}
			],
			items1: [{
					parent: 0,
					name: 'Адаптация персонала',
					file: '/disk/downloadFile/46698/?&ncc=1&filename=1.pdf',
			},
				{
					parent: 0,
					name: 'Регламент адаптация персонала',
					file: '/disk/downloadFile/46679/?&ncc=1&filename=2.docx',
				},
			],
			items2: [{
				parent: 0,
				name: 'Противодействие коррупции',
				file: '/disk/downloadFile/46701/?&ncc=1&filename=1.pdf',
			}],
			items3: [{
				parent: 0,
				name: 'Корпоративная этика',
				file: '/disk/downloadFile/46702/?&ncc=1&filename=1.pdf'
			}],
			items4: [{
					parent: 0,
					name: 'Кодекс Риски АО АХ Степь',
					file: '/disk/downloadFile/46794/?&ncc=1&filename=1.docx'
				},
				{
					parent: 0,
					name: 'Кодекс Страхование АО АХ Степь редакция декабрь 2017',
					file: '/disk/downloadFile/46795/?&ncc=1&filename=2.docx'
				},
			],
			items5: [{
				parent: 0,
				name: 'Тренинг по противодействию мошенническим действиям',
				file: '/disk/downloadFile/46816/?&ncc=1&filename=1.pdf'
			}],
			items6: [{
				parent: 0,
				name: 'Тренинг «Система внутреннего контроля».',
				file: '/disk/downloadFile/47005/?&ncc=1&filename=1.pdf'
			}],
			items7: [{
				parent: 0,
				name: 'Антимонопольная политика Агрохолдинга «СТЕПЬ»',
				file: '/disk/downloadFile/47146/?&ncc=1&filename=1.pdf'
			}],
			cards: [{
					id: 0,
					parent: 'excel',
					name: 'Обучение Excel'
				},
				{
					id: 1,
					parent: 'hr_adapt',
					name: 'Адаптация персонала'
				},
				{
					id: 2,
					parent: 'security',
					name: 'Противодействие коррупции'
				},
				{
					id: 3,
					parent: 'corp',
					name: 'Корпоративная этика'
				},
				{
					id: 4,
					parent: 'risks',
					name: 'Управление рисками'
				},
				{
					id: 5,
					parent: 'fraud',
					name: 'Противодействие мошенническим действиям'
				},
				{
					id: 6,
					parent: 'control',
					name: 'Система внутреннего контроля в Агрохолдинге'
				},
				{
					id: 7,
					parent: 'learning_antimonpol',
					name: 'Обучение по антимонопольной политике'
				}
			]
		}
	})