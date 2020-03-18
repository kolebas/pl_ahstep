$(document).ready(function(){
    console.log('Страница загружена');
    var doc = document,
		btn = doc.getElementById('btn_send');
		//toggles = doc.querySelectorAll('.toggle');
	
	var usr_sel = doc.getElementById('ui-tile-selector-user');
	usr_sel.classList.add('ui-ctl-sm');
	
	function user_select()
	{
		var usr_sl = doc.getElementById('usr_test').value;
		alert (usr_sl);
	}
	
	var btn_dis = function()
	{
		btn.classList.add('ui-btn-clock', 'ui-btn-disabled');
	}
	
	var vac = function(){
		var s_zam = doc.getElementById('zam').value,
		    s_start = doc.getElementById('start').value,
		    s_finish = doc.getElementById('finish').value,
		    s_type = doc.getElementById('type').value,
            s_text = doc.getElementById('text').value;
        console.log(s_type);
		$.ajax({
			
			type: 'POST',
			url: 'ajax.php',
			data: ({
				zam: s_zam,
				start: s_start,
				finish: s_finish,
				type: s_type,
				text: s_text
			}),
			success: function(data)
			{
				alert ('успешно');
				document.write(data);
			}
		});
    }

    var btn_send = function(){
        var fm = doc.getElementById('vac');
        if (fm.checkValidity()){
            btn_dis();
            vac();
        } else {
			alert ('Заполните все поля');
		}

	}
	
	var tgl_email_f = function(){
		let tgl_on = doc.getElementById('on_e');
		let tgl_off = doc.getElementById('off_e');
		//console.log(toggle);
		if (tgl_on.classList.contains('invis')) {
			tgl_on.classList.toggle('invis', false);
			tgl_off.classList.toggle('invis', true);
			doc.getElementById('email').classList.toggle('invis', false);
		}else {
			tgl_off.classList.toggle('invis', false);
			tgl_on.classList.toggle('invis', true);
			doc.getElementById('email').classList.toggle('invis', true);
		}
	}
	var tgl_zam_f = function(){
		let tgl_on = doc.getElementById('on_u');
		let tgl_off = doc.getElementById('off_u');
		//console.log(toggle);
		if (tgl_on.classList.contains('invis')) {
			tgl_on.classList.toggle('invis', false);
			tgl_off.classList.toggle('invis', true);
			doc.getElementById('zam_user').classList.toggle('invis', false);
		}else {
			tgl_off.classList.toggle('invis', false);
			tgl_on.classList.toggle('invis', true);
			doc.getElementById('zam_user').classList.toggle('invis', true);
		}
	}
    let toggles = doc.querySelectorAll('.toggle');
	btn.addEventListener('click', btn_send, false);
	let tgl_zam = doc.getElementById('toggle_zam');
	tgl_zam.addEventListener('click', tgl_zam_f, false);
	let tgl_email = doc.getElementById('toggle_email');
	tgl_email.addEventListener('click', tgl_email_f, false);
	/*for (let toggle of toggles){
		console.log(toggle);
		toggle.addEventListener('click', tgl, false);
	
	}*/

});