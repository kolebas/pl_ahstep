<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Отсуствия");
	Bitrix\Main\UI\Extension::load("ui.forms");
	\Bitrix\Main\UI\Extension::load("ui.buttons"); 
	?>

<link href="style.css" rel="stylesheet">
<script src="script.js"></script>

<form id="vac">
	<table class="table_cm">
		<tbody>
			<tr>
				<td colspan="1" class="td_head">
					<h2 style="text-align: center;">Добавление отсуствия!</h2>
					<p style="line-height: 1.5;">
						Внимание: поле заместитель носит информационный характер.<br> 
						<?	
							$arSelect = Array();
							$arFilter = Array("IBLOCK_ID"=>'3', "CREATED_BY"=>$GLOBALS["USER"]->GetID(), "ACTIVE"=>"Y" , ">=DATE_ACTIVE_FROM"=>date("d.m.Y"));
							$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
							echo '<div id="msg" class="ui-ctl-label-text invis"><b>Мои отсуствия:</b></div>';
							while($ob = $res->GetNextElement())
							{
								$arFields = $ob->GetFields();
								echo '<button id="btn_tm" type="" class="ui-btn ui-btn-xs btn-tm-' . $arFields["ID"] . '">' . $arFields["NAME"] . ' до ' . $arFields["DATE_ACTIVE_TO"] . '</button>&nbsp';
								echo '
								<div id="hideBlock_' . $arFields["ID"] . '" style="display:none">
								<h2 style="text-align: center;">Карточка отсуствия</h2>
								<div>
								<label class="ui-ctl ui-ctl-radio">
								<div class="ui-ctl-label-text"><b>Тип отсуствия:</b></div>
								<div class="ui-ctl-label-text text-popup">' . $arFields["NAME"] . '</div>
								</label>
								<label class="ui-ctl ui-ctl-radio">
								<div class="ui-ctl-label-text"><b>Начало:</b></div>
								<div class="ui-ctl-label-text text-popup">' . $arFields["DATE_ACTIVE_FROM"] . '</div>
								</label>
								<label class="ui-ctl ui-ctl-radio">
								<div class="ui-ctl-label-text"><b>Завершение:</b></div>
								<div class="ui-ctl-label-text text-popup">' . $arFields["DATE_ACTIVE_TO"] . '</div>
								</label>
								</div>	
								</div>';
							?><script>
									let msg = document.getElementById('msg');
									msg.classList.toggle('invis', false);
								</script>
							<script>
								window.BXDEBUG = true;
								BX.ready(function(){
									var oPopup = new BX.PopupWindow('call_feedback', window.body, {
										autoHide : true,
										offsetTop : 1,
										offsetLeft : 0,
										lightShadow : true,
										closeIcon : true,
										closeByEsc : true,
										overlay: {
											backgroundColor: 'black', opacity: '80'
										},
										buttons: [
										new BX.PopupWindowButton({
											text: "Удалить",
											className: "popup-window-button-accept",
											events: {click: function(){
												$.ajax({
													type: 'POST',
													url: 'rm_vac_ajax.php',
													data: ({
														ELEMENT_ID: '<? echo $arFields["ID"]?>',
													}),
													success: function(data)
													{
														alert ('успешно');
														document.write(data);
														//this.popupWindow.close();
													}
												});
											}
											}
										}),
										new BX.PopupWindowButton({
											text: "Отмена",
											className: "",
											events: {click: function(){
												this.popupWindow.close(); // закрытие окна
											}}
										})
										]
									});
									oPopup.setContent(BX('hideBlock_<? echo $arFields["ID"]?>'));
									BX.bindDelegate(
									document.body, 'click', {className: 'btn-tm-<? echo $arFields["ID"]?>'},
									BX.proxy(function(e){
										if(!e)
										e = window.event;
										oPopup.show();
										return BX.PreventDefault(e);
									}, oPopup)
									);
								});
							</script>
							<?
							}
						?>
					</p>
				</td>
			</tr>
			<tr>
				<td class="td">
					<br>
					<div id="select_div">
						<div class="ui-ctl-label-text">
							<b>Тип отсуствия:</b>
						</div>
						<div class="ui-ctl ui-ctl-after-icon ui-ctl-w100 ui-ctl-dropdown">
							<div class="ui-ctl-after ui-ctl-icon-angle">
							</div>
							<select id="type" class="ui-ctl-element" required="">
								<option></option>
								<option>Отпуск ежегодный</option>
								<option>Командировка</option>
								<option>Больничный</option>
								<option>Отпуск декретный</option>
								<option>Отгул за свой счет</option>
								<option>Другое</option>
							</select>
						</div>
					</div>
					<br>
					<div class="ui-ctl-label-text">
						<b>Период отсуствия:</b>
					</div>
					<label class="ui-ctl ui-ctl-radio">
						<div class="ui-ctl-label-text">
							<b>Начало:</b>
						</div>
						<div class="ui-ctl ui-ctl-after-icon ui-ctl-date" style="margin-left: 104px;">
							<div class="ui-ctl-after ui-ctl-icon-calendar">
							</div>
							<input id="start" type="text" style="padding-left: 15px;" class="ui-ctl-element ui-ctl-w100" onclick="BX.calendar({node: this, field: this, bTime: false});" required="">
						</div>
						</label> <label class="ui-ctl ui-ctl-radio">
						<div class="ui-ctl-label-text">
							<b>Завершение:</b>
						</div>
						<div class="ui-ctl ui-ctl-after-icon ui-ctl-date" style="margin-left: 70px;">
							<div class="ui-ctl-after ui-ctl-icon-calendar">
							</div>
							<input id="finish" type="text" style="padding-left: 15px;" class="ui-ctl-element ui-ctl-w100" onclick="BX.calendar({node: this, field: this, bTime: false});" required="">
						</div>
					</label> 
					<br>
					<label class="ui-ctl ui-ctl-radio">
						<div class="ui-ctl-label-text"><b>Установить заместителя:</b></div>
							<div id="toggle_zam" class="toggle">
								<input type="checkbox" style="margin-left: 88px;">
								<label id="on_u" for="" class="label on invis">ДА</label>
								<label id="off_u" for="" class="label off">НЕТ</label>
							</div>
						</div>
					</label>
					<div id="zam_user" class="invis">
					<br>
					<div class="ui-ctl-label-text" >
						<b>Выберите заместителя:</b>
					</div>
					<div class="ui-ctl ui-ctl-textbox ui-ctl-w100 ui-ctl-sm">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.user.selector",
							" ",
							Array(
							"API_VERSION" => 3,
							"ID" => "user",
							"INPUT_NAME" => "zam",
							"LIST" => array_keys($crmQueueSelected),
							"SELECTOR_OPTIONS" => ["departmentSelectDisable"=>"Y",'context'=>'MAIL_CLIENT_CONFIG_QUEUE','contextCode'=>'U','enableAll'=>'N','userSearchArea'=>'I'],
							"USE_SYMBOLIC_ID" => true
							)
						);?>
					</div>
					</div>
					<br>
					<label class="ui-ctl ui-ctl-radio">
						<div class="ui-ctl-label-text"><b>Установить ответ для сообщений электроннй почты:</b></div>
							<div id="toggle_email" class="toggle">
								<input type="checkbox">
								<label id="on_e" for="" class="label on invis">ДА</label>
								<label id="off_e" for="" class="label off">НЕТ</label>
							</div>
						</div>
					</label>
					<div id="email" class="invis">
					<div class="ui-ctl-label-text">
						<b>Ответ для почтовых сообщений:</b>
					</div>
					<div class="ui-ctl ui-ctl-textarea" style="width: 508px;">
						<textarea id="text" class="ui-ctl-element"></textarea>
					</div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="1" style="text-align: center;">
					<button id="btn_send" type="submit" class="ui-btn ui-btn-primary">Добавить</button>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>