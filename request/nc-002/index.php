<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$title = 'Заявка на создание сетевого каталога';
	$APPLICATION->SetTitle($title);
	\Bitrix\Main\UI\Extension::load("ui.forms");
?>

<?
$arFilter = Array(
	"IBLOCK_ID"=>"67"
	);
   $res = CIBlockElement::GetList(Array("NAME"=>"ASC"), $arFilter, Array("NAME"));
?> 

<link href="style.css" rel="stylesheet">
<script src="main.js"></script>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Главная </a></li>
		<li class="breadcrumb-item"><a href="/it-uslugi/">Заявки</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?echo $title;?></li>
	</ol>
</nav>

<div class="results"></div>
<form id="nc-002">
	<table class="table_cm">
		<tbody>
			<tr>
				<td class="td_head" colspan="1">
					<br>
					<h2 style="text-align: center;"><?echo $title;?></h2>
					<p style="line-height: 1.5;">
						Данная услуга позволяет создать сетевой каталог (сетевую папку).
						Название каталога складывается из аббревиатуры организации, далее название департамента, затем название папки. Пример: «AHS-Бухгалтерия-Оперативный учет», где «AHS» – аббревиатура АО Агрохолдинг "СТЕПЬ", «Бухгалтерия» – наименование департамента, «Оперативный учет» - название папки.
						Также вы сможете отслеживать статус заявки в разделе <button id="btn_ticket" type="button" class="ui-btn ui-btn-xs">Мои заявки</button><br>
						<b>После исполнения заявки пользователям которым предоставляется доступ необходимо перезагрузить свой компьютер.</b>
					</p>
				</td>
			</tr>
			<tr>
				<td class="td">
				<br>
					<div class="ui-ctl-label-text">
						<b>Организация:</b>
					</div>
					<div class="ui-ctl ui-ctl-after-icon ui-ctl-w100 ui-ctl-dropdown">
						<div class="ui-ctl-after ui-ctl-icon-angle">
						</div>
						<select id="org" class="ui-ctl-element" required>
							<option></option>
							<?
								while($ar_fields = $res->GetNext())
									{
										 echo '<option>' . $ar_fields["NAME"] . '</option>';
									}
							?>
						</select>
					</div>
					<br>
					<div class="ui-ctl-label-text" for="dep">
						<b>Название департамента:</b>
					</div>
					<div id="div_dep" :class="input_class">
						<div class="ui-ctl-after">
						</div>
						<input id="dep" class="ui-ctl-element" placeholder="Например: Отдел кадров" required>
					</div>
					<br>
					<div class="ui-ctl-label-text">
						<b>Название каталога:</b>
					</div>
					<div :class="input_class">
						<div class="ui-ctl-after">
						</div>
						<input id="fld_name" class="ui-ctl-element" placeholder="Например: График отпусков" required>
					</div>
					<br>
					<div class="ui-ctl-label-text">
						<b>Итоговое название каталога:</b>
					</div>
					<div class="ui-ctl ui-ctl-textbox ui-ctl-w100 ui-ctl-disabled">
						<div class="ui-ctl-after">
						</div>
						<input id="fld_name_complete" class="ui-ctl-element" disabled>
					</div>
					<br>
					<div class="ui-ctl-label-text">
						<b>Бизнес-владелец:</b>
					</div>
					<div class="ui-ctl ui-ctl-textbox ui-ctl-w100 ui-ctl-textbox"> 
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
						<b>Пользователи с возможность записи:</b>
					</div>
					<div class="ui-ctl ui-ctl-textbox ui-ctl-w100 ui-ctl-xs"> 
						<?
							$APPLICATION->IncludeComponent(
							'bitrix:main.user.selector',
							' ',
							[
							"ID" => "rw_user",
							"API_VERSION" => 3,
							"INPUT_NAME" => "rw_user[]",
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
						<b>Пользователи с возможность просмотра:</b>
					</div>
					<div class="ui-ctl ui-ctl-textbox ui-ctl-w100 ui-ctl-xs"> 
						<?
							$APPLICATION->IncludeComponent(
							'bitrix:main.user.selector',
							' ',
							[
							"ID" => "ro_user",
							"API_VERSION" => 3,
							"INPUT_NAME" => "ro_user[]",
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
						<b>Описание каталога:</b>
					</div>
					<div class="ui-ctl ui-ctl-textarea ui-ctl-w100">
						<textarea id="cmnt" rows="5" class="ui-ctl-element" ></textarea>
					</div>
					<br>
				</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="1">
					<button id="btn_send" type="button" class="ui-btn ui-btn-primary">Отправить</button>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<div id="results"> </div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>													