$(document).ready(function () {
	read_data();
	$('[name="inputImage"]').change(function(){
        const file = this.files[0];
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
});

function read_data(){
	$.ajax({
		type: "GET",
		url: baseUrl+ "admin/profil/get_data",
		dataType: "json",
		success: function (response) {
			$('[name="inputName"]').val(response.data.profil_name);
			$('[name="inputEmail"]').val(response.data.profil_email);
			$('[name="inputEducation"]').val(response.data.profil_education);
			$('[name="inputLocation"]').val(response.data.profil_location);
			$('[name="inputSkills"]').val(response.data.profil_skill);
			$('[name="inputExperience"]').val(response.data.profil_experience);

			$('#textEducation').text(response.data.profil_education);
			$('#textLocation').text(response.data.profil_location);
			$('#textSkills').text(response.data.profil_skill);
			$('#textExperience').text(response.data.profil_experience);

			$('#textName').text(response.data.profil_name);
			$('#textEmail').text(response.data.profil_email);
		}
	});
}

$('#formSetting').on('submit', function(e){
	e.preventDefault();
	div_overlay('setting');
	$.ajax({
		type: "POST",
		url: baseUrl+'admin/profil/save_setting',
		data: submit_form_data_file('#formSetting'),
		dataType: "JSON",
		processData: false,
		contentType:false,
		cache : false,
		success: function (response) {
			notify_toast(response);
			read_data();
			div_overlay_close('setting');
			if (response.errorCode == 1) {
				$('.imgProfil').attr('src', response.image_url);
			}
		},
		error: function(jqXHR){
			console.log(jqXHR.responseText);
		}
	});
});

$('#formPassword').on('submit', function(e){
	e.preventDefault();
	div_overlay('password');
	$.ajax({
		type: "POST",
		url: baseUrl+'admin/profil/save_password',
		data: submit_form_data('#formPassword'),
		dataType: "JSON",
		success: function (response) {
			notify_toast(response);
			div_overlay_close('password');
			$('#formPassword')[0].reset();
		},
		error: function(jqXHR){
			console.log(jqXHR.responseText);
		}
	});
});
