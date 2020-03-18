<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$title = 'Заявка на создание/изменение сетевого каталога (внешние сотрудники)';
	$APPLICATION->SetTitle($title);
	\Bitrix\Main\UI\Extension::load("ui.forms");
	\Bitrix\Main\UI\Extension::load("ui.buttons");
	\Bitrix\Main\UI\Extension::load("ui.notification");
?>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<link href="style.css" rel="stylesheet">
<script src="script.js"></script>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Главная </a></li>
		<li class="breadcrumb-item"><a href="/it-uslugi/">Заявки</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?echo $title;?></li>
	</ol>
</nav>

<form id="nc-004">
	<table class="table_cm">
		<tbody>
			<tr>
				<td class="td_head" colspan="1">
					<br>
					<h2 style="text-align: center;"><?echo $title;?></h2>
					<p style="line-height: 1.5;">
						Данная услуга позволяет создать сетевой каталог (сетевую папку) либо предоставить доступ к существующему каталогу внешнему сотруднику.Также вы сможете отслеживать статус заявки в разделе <button id="btn_ticket" type="button" class="ui-btn ui-btn-xs">Мои заявки</button>
					</p>
				</td>
			</tr>
			<tr>
				<td class="td">
					<br>
					<div class="ui-ctl-label-text">
						<b>Название каталога:</b>
					</div>
					<div class="ui-ctl ui-ctl-textbox ui-ctl-w100"> 
						<input id="fld_name" type="text" class="ui-ctl-element" required>
					</div>
					<br>
					<div class="ui-ctl-label-text">
						<b>Бизнес владелец:</b>
					</div>
					<div class="ui-ctl ui-ctl-textbox ui-ctl-w100 ui-ctl-sm"> 
						<?
							$APPLICATION->IncludeComponent(
							'bitrix:main.user.selector',
							' ',
							[
							"ID" => "bp_user",
							"API_VERSION" => 3,
							"INPUT_NAME" => "bp_user",
							"LIST" => array_keys($crmQueueSelected),
							"USE_SYMBOLIC_ID" => true,
							"SELECTOR_OPTIONS" => 
							[
							"departmentSelectDisable" => "Y",
							'context' => 'MAIL_CLIENT_CONFIG_QUEUE',
							'contextCode' => 'U',
							'enableAll' => 'N',
							'userSearchArea' => 'I'
							]
							]
							);
							
						?>
					</div>
					<br>
					<div class="ui-ctl-label-text">
						<b>Кому предоставляется доступ (контактные данные):</b>
					</div>
					<div class="ui-ctl ui-ctl-textarea ui-ctl-w100">
						<textarea id="info" rows="10" class="ui-ctl-element" required></textarea>
					</div>
					<br>
				</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="1">
					<button id="btn_send" type="submit" class="ui-btn ui-btn-primary">Отправить</button>
				</td>
			</tr>
		</tbody>
	</table>
</form>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>													