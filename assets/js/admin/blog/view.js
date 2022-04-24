var table;

$(document).ready(function () {
	table = $('#tableData').DataTable({
		"scrollY": '70vh',
		"responsive": true,
		"processing": false,
		"serverSide": true,
		"order": [],
		"ajax": {
			"url": baseUrl + "admin/blog/ajax_list",
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
