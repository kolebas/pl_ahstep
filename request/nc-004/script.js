$(document).ready(function(){

    var doc = document,
		btn = doc.getElementById('btn_send'),
		btn_ticket = doc.getElementById('btn_ticket'),
		fm = doc.getElementById('nc-004');
    	
	var sbmt = function(){
        var dtn_dis = function(){
            btn.classList.add('ui-btn-clock', 'ui-btn-disabled');
        };
		var username = $('#username').val();
		var s_fld_name = doc.getElementById('fld_name').value;
		var s_bp_user = doc.getElementById('bp_user').value;
		var s_info = doc.getElementById('info').value;
		$.ajax({
			url: "ajax.php",
			type: "post",
			data: { 				
				fld_name: s_fld_name,
				traditional: true,
				bp_user: s_bp_user,
				info: s_info 
				},
			}).done(function () {
			alert("Отправлено!");
			doc.location.href = '/it-uslugi/';
			$('#results').html(data);
			test();
			}).fail(function () {
			alert("Ошибка!");
		});
	}
	
	var my_ticket = function(){
		location.href = '../../../it-uslugi/helpdesk/my_ticket.php';
        console.log('Нажата');
	}
	
	var check = function(){
		btn_send.classList.add('ui-btn-clock', 'ui-btn-disabled');
		if ( fm.checkValidity ()) {
			sbmt();
		}	else {
			btn_send.classList.remove('ui-btn-clock', 'ui-btn-disabled');
			alert ('Заполните все поля');
		}

	}
    
	btn_send.addEventListener('click', check, false);
	btn_ticket.addEventListener('click', my_ticket, false);

});