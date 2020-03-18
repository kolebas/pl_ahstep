<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$title = 'Заявка на добавление/изменение доступа к сетевому каталогу';
	$APPLICATION->SetTitle($title);
	\Bitrix\Main\UI\Extension::load("ui.forms");
	\Bitrix\Main\UI\Extension::load("ui.buttons");
	\Bitrix\Main\UI\Extension::load("ui.notification");
	\Bitrix\Main\UI\Extension::load("ui.alerts");
?>
<?
	$dir    = '/mnt/ahs-nfs001';
	$dir = scandir($dir);
?>

<link href="style.css" rel="stylesheet">
<script src="script.js"></script>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Главная </a></li>
		<li class="breadcrumb-item"><a href="/it-uslugi/">Заявки</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?echo $title;?></li>
	</ol>
</nav>

<div class="results"></div>
<form id="nc003">
	<table class="table_cm">
		<tbody>
			<tr>
				<td class="td_head" colspan="1">
					<br>
					<h2 style="text-align: center;"><?echo $title;?></h2>
					<p style="line-height: 1.5;">
						Данная услуга позволяет изменить права доступа к ранее созданному сетевому каталогу (сетевой папки). Также вы сможете отслеживать статус заявки в разделе <button id="btn_ticket" type="button" class="ui-btn ui-btn-xs">Мои заявки</button><br>
						<b>После исполнения заявки пользователям которым предоставляется доступ необходимо перезагрузить свой компьютер.</b>
					</p>
				</td>
			</tr>
			<tr>
				<td class="td">
					<br>
					<div class="ui-ctl-label-text">
						<b>Название каталога:</b>
					</div>
					<div class="ui-ctl ui-ctl-after-icon ui-ctl-w100 ui-ctl-dropdown">
						<div class="ui-ctl-after ui-ctl-icon-angle">
						</div>
						<select id="fld_name" class="ui-ctl-element" required>
							<option></option>
							<?
								foreach($dir as $key=>$value)
								{
									echo '<option>' . $value . '</option>';
									
								}
							?>
						</select>
					</div>
					<br>
					<div class="ui-ctl-label-text">
						<b>Пользователи с возможность записи:</b>
					</div>
					<div class="ui-ctl ui-ctl-textbox ui-ctl-w100 ui-ctl-sm"> 
						<?
							$APPLICATION->IncludeComponent(
							'bitrix:main.user.selector',
							' ',
							[
							"ID" => "ro_user",
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
					<div class="ui-ctl ui-ctl-textbox ui-ctl-w100 ui-ctl-sm"> 
						<?
							$APPLICATION->IncludeComponent(
							'bitrix:main.user.selector',
							' ',
							[
							"ID" => "rw_user",
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
						<b>Пользователи которых нужно отключить от каталога:</b>
					</div>
					<div class="ui-ctl ui-ctl-textbox ui-ctl-w100 ui-ctl-sm"> 
						<?
							$APPLICATION->IncludeComponent(
							'bitrix:main.user.selector',
							' ',
							[
							"ID" => "rm_user",
							"API_VERSION" => 3,
							"INPUT_NAME" => "rm_user[]",
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
						<b>Комментарий:</b>
					</div>
					<div class="ui-ctl ui-ctl-textarea ui-ctl-w100">
						<textarea id="cmnt" rows="5" class="ui-ctl-element" ></textarea>
					</div>
					<br>
				</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="1">
					<button id="btn_sent"  class="ui-btn ui-btn-primary test">Отправить</button>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<div id="results"> </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>													