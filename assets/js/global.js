var token = $('meta[name=token_name]').attr("content");
var token_hash = $('meta[name=token_hash]').attr("content");

function submit_form_data(id) {
	return $(id).serialize() + '&'+token+'=' + token_hash;
}
