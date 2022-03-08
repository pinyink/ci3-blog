var token = $('meta[name=token_name]').attr("content");
var token_hash = $('meta[name=token_hash]').attr("content");

function submit_form_data(id) {
	return $(id).serialize() + '&'+token+'=' + token_hash;
}

function submit_form_data_file(id) {
	var form = $(id)[0];
	var formData = new FormData(form);
	formData.append(token, token_hash);
	return formData;
}


function div_overlay(id) {
	$('#div_'+id).addClass('overlay-wrapper');
	$('#div_'+id+'.overlay-wrapper').append('<div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>');
}

function div_overlay_close(id) {
	$('#div_'+id+'.overlay-wrapper').find('.overlay').remove();
	$('#div_'+id).removeClass('overlay-wrapper');
}
