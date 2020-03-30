$(document).ready(function(){

	var doc = document,
		fm = doc.getElementById('nc003'),
		btn_ticket = doc.getElementById('btn_ticket'),
		btn = doc.getElementById('btn_sent');

	var sbmt = function() {
		s_fld_name = doc.getElementById('fld_name').value,
		s_cmnt = doc.getElementById('cmnt').value;
		
		var ifs = document.getElementsByName("rw_user[]"),
			ar_ifs = ifs.length;
			ar_usr_all = [];
			
		for (var i = 0; i < ar_ifs; i++) {
			var rw_usr = document.getElementsByName('rw_user[]')[i].value,
				rw_usr = rw_usr.replace("U", "user_");
			if (i != 0){
				var rw_usr_all = rw_usr_all + ', ' + rw_usr;
			}
			else {
				rw_usr_all = rw_usr;
			}
		}
		
		var ifs = document.getElementsByName("ro_user[]"),
			ar_ifs = ifs.length;
		
		for (var i = 0; i < ar_ifs; i++) {
			var ro_usr = document.getElementsByName('ro_user[]')[i].value,
				ro_usr = ro_usr.replace("U", "user_");
			if (i != 0){
				var ro_usr_all = ro_usr_all + ', ' + ro_usr;;
			}
			else {
				ro_usr_all = ro_usr;
			}
		}
		var ifs = document.getElementsByName("rm_user[]"),
			ar_ifs = ifs.length,
			ar_rm_usr = [];
						
		for (var i = 0; i < ar_ifs; i++) {
			var rm_usr = document.getElementsByName('rm_user[]')[i].value,
				rm_usr = rm_usr.replace("U", "user_");
			if (i != 0){
				var rm_usr_all = rm_usr_all + ', ' + rm_usr;;
			}
			else {
				rm_usr_all = rm_usr;
			}
			
		}
		$.ajax({
			url: "ajax.php",
			type: "post",
			data: { 				
				fld_name: s_fld_name,
				traditional: true,
				rw_usr_all: rw_usr_all,
				ro_usr_all: ro_usr_all,
				rm_usr_all: rm_usr_all,
				cmnt: s_cmnt,
			},
			}).done(function (data) {
			alert("Отправлено!");
			document.location.href = '/it-uslugi/';
			//$('#results').html(data);
						}).fail(function () {
			alert("Ошибка!");
		});
	}
	
	var check = function(){
		btn.classList.add('ui-btn-clock', 'ui-btn-disabled');
		if ( fm.checkValidity ()) {
			sbmt();
		}	else {
			btn.classList.remove('ui-btn-clock', 'ui-btn-disabled');
			alert ('Заполните все поля');
		}

	}

	var my_ticket = function(){
		location.href = '../../../it-uslugi/helpdesk/my_ticket.php';
        console.log('Нажата');
    }

	btn.addEventListener('click', check, false);
	btn_ticket.addEventListener('click', my_ticket, false);
	
});