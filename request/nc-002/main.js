$(document).ready(function() {

    /*var app = new Vue({
        el: '#nc-002',
        data: {
            title: 'Заявка на создание сетевого каталога',
            input_class: 'ui-ctl ui-ctl-after-icon ui-ctl-w100',
            item_class: 'pl_categories list-group-item-action',
            message: 'Для получения доступа к сервису или услуге, выберите нужный раздел, а затем услугу, после заполнения необходимых полей формы заявка будет отправлена на согласование отвественных сотрудникам. Статус заявки вы можете отслеживать в разделе',
            path_service: '../../it-uslugi/uslugi/',
            type: '',
        },

    })*/

    console.log('Страница загружена');
    let doc = document,
        btn = doc.getElementById('btn_send'),
        fm = doc.getElementById('nc-002'),
        btn_ticket = doc.getElementById('btn_ticket');

    var sbmt = function() {
        var cat = doc.getElementById('cat').value,
            org = doc.getElementById('org').value,
            dep = doc.getElementById('dep').value,
            bp_usr = doc.getElementById('bp_user').value.replace("U", "user_"),
            s_cmnt = doc.getElementById('cmnt').value,
            fld_name_complete = doc.getElementById('fld_name_complete').value;

        var ifs = doc.getElementsByName("rw_user[]"),
            ar_ifs = ifs.length;

        for (var i = 0; i < ar_ifs; i++) {
            var rw_usr = document.getElementsByName('rw_user[]')[i].value,
                rw_usr = rw_usr.replace("U", "user_");
            if (i != 0) {
                var rw_usr_all = rw_usr_all + ', ' + rw_usr;
            } else {
                rw_usr_all = rw_usr;
            }
        }

        var ifs = document.getElementsByName("ro_user[]"),
            ar_ifs = ifs.length;

        for (var i = 0; i < ar_ifs; i++) {
            var ro_usr = document.getElementsByName('ro_user[]')[i].value,
                ro_usr = ro_usr.replace("U", "user_");
            if (i != 0) {
                var ro_usr_all = ro_usr_all + ', ' + ro_usr;
            } else {
                ro_usr_all = ro_usr;
            }
        }

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: {
                org: org,
                dep: dep,
                fld_name: fld_name_complete,
                traditional: true,
                bp_usr: bp_usr,
                rw_usr_all: rw_usr_all,
                ro_usr_all: ro_usr_all,
                cmnt: s_cmnt,
            },
        }).done(function(data) {
            alert("Отправлено!");
            document.location.href = '/ahstep/services/';
        }).fail(function() {
            alert("Ошибка!");
        });
    }

    var org_func = function() {
        org_v = org.value;
        fld_name_complete.value = org_v + '-';
    }

    var dep_func = function() {
        dep_v = dep.value;
        fld_name_complete.value = org_v + '-' + dep_v + '-';
    }

    var cat_func = function() {
        cat_v = cat.value;
        fld_name_complete.value = org_v + '-' + dep_v + '-' + cat_v;
    }

    var check = function() {
        if (fm.checkValidity()) {
            sbmt();
        } else {
            alert('Заполните все поля');
            doc.getElementById('div_dep').parentNode.classList.add('ui-ctl-danger');
        }

    }

    var my_ticket = function() {
        location.href = '../../../it-uslugi/helpdesk/my_ticket.php';
        console.log('Нажата');
    }

    org.addEventListener('change', org_func, false);
    dep.addEventListener('change', dep_func, false);
    cat.addEventListener('change', cat_func, false);
    btn.addEventListener('click', check, false);
    btn_ticket.addEventListener('click', my_ticket, false);

});