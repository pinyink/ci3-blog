var table;
var save_method;

$(document).ready(function () {
	table = $('#tableData').DataTable({
		"scrollY": '70vh',
		"responsive": true,
		"processing": false,
		"serverSide": true,
		"order": [],
		"ajax": {
			"url": baseUrl + "admin/user/ajax_list",
			"type": "POST",
			"data": function (data) {
				data.csrf_test_name = token_hash;
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseText);
			}
		},
		"columnDefs": [{
			"targets": [0, 4],
			"orderable": false,
		}, ],
	});
});

function reload_table() {
	table.ajax.reload(null, false);
}

function modal_add(){
	save_method = 'save';
	$('#form-user')[0].reset();
	$('[name="password"]').prop('disabled', false);
	$('[name="repassword"]').prop('disabled', false);
	$('#modal-default .modal-title').text('Tambah User');
	$('#modal-default').modal('show');
}

$('#form-user').submit(function (e) { 
	e.preventDefault();
	var url;
	if (save_method == 'save') {
		url = baseUrl+ "admin/user/save_user";
	} else if (save_method == 'update') {
		url = baseUrl+ "admin/user/update_user";
	}
	$.ajax({
		type: "POST",
		url: url,
		data: submit_form_data('#form-user'),
		dataType: "JSON",
		success: function (response) {
			notify_toast(response);
			reload_table();
			$('#modal-default').modal('hide');
		}
	});
});

function get_user(id){
	$.ajax({
		type: "GET",
		url: baseUrl + "admin/user/get_user/"+id,
		dataType: "JSON",
		success: function (response) {
			save_method = 'update';
			$('#form-user')[0].reset();
			$('[name="password"]').prop('disabled', true);
			$('[name="repassword"]').prop('disabled', true);
			$('[name="user_id"]').val(response.data.user_id);
			$('[name="username"]').val(response.data.user_username);
			$('[name="username"]').prop('disabled', true);
			$('[name="active"]').val(response.data.user_active);
			$('#modal-default .modal-title').text('Update User');
			$('#modal-default').modal('show');
		}
	});
}
