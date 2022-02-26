$('#formSetting').on('submit', function(e){
	e.preventDefault();
	console.log(submit_form_data('#formSetting'));
	$.ajax({
		type: "POST",
		url: baseUrl+'admin/profil/save_setting',
		data: submit_form_data('#formSetting'),
		dataType: "JSON",
		success: function (response) {
			console.log(response);
		}
	});
});
