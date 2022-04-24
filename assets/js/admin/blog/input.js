$(document).ready(function () {
	$('#summernote').summernote({
		height: 300,
	});
});

function modal_file() {
	$('#modal-file').modal('show');
	$('#modal-file .modal-title').text('List Files');
	$('#form_edit_file')[0].reset();
}

function get_file(offset = null, callback = function(){}) {
	$.ajax({
		type: "GET",
		url: baseUrl + "admin/file/get_data/12/"+offset,
		dataType: "JSON",
		success: function (response) {
			var html = '';
			$.each(response.data, function (indexInArray, valueOfElement) { 
				html += '<div class="col-md-3 col-sm-6 col-xs-6">'+
										'<div class="card">'+
											'<img class="card-img-top" style="height: 200px;" src="'+baseUrl+valueOfElement.file_path+'" alt="Card image cap">'+
											'<div class="card-body">'+
												'<p class="card-text">'+valueOfElement.file_desc+'</p>'+
												'<a href="javascript:;" onclick="edit_file('+valueOfElement.file_id+')" class="card-link btn btn-default btn-sm"><i class="fa fa-edit"></i> Edit</a>'+
											'</div>'+
										'</div>'+
									'</div>';
			});
			$('#div_file').html(html);
			if (response.num_rows >= 1) {
				$('.pagination').show();
				$('.pagination').pagination({
					items: response.num_rows,
					itemsOnPage: 12,
					cssStyle: 'light-theme',
					currentPage: offset,
					onPageClick: function (e) {
						get_file(e);
					},
				});
			} else {
				$('.pagination').hide();
			}

			callback();
		}
	});
}

function edit_file(id) {
	$.ajax({
		type: "GET",
		url: baseUrl+'admin/file/get_detail/'+id,
		dataType: "JSON",
		success: function (response) {
			$('[name="file_desc"]').val(response.file_desc);
			$('[name="file_id"]').val(response.file_id);
			$('[name="file_path"]').val(baseUrl+response.file_path);
			$('a[href="#custom-tabs-detail-file"]').tab('show');
			$('#img-file').attr('src', baseUrl+response.file_path);
		}
	});
}

$('#form_edit_file').submit(function (e) { 
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: baseUrl+"admin/file/update",
		data: submit_form_data('#form_edit_file'),
		dataType: "JSON",
		success: function (response) {
			notify_toast(response);
		}
	});
});

$(function () {
	get_file();
});

// DropzoneJS Demo Code Start
Dropzone.autoDiscover = false

// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
var previewNode = document.querySelector("#template")
previewNode.id = ""
var previewTemplate = previewNode.parentNode.innerHTML
previewNode.parentNode.removeChild(previewNode)

var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
	url: baseUrl + "admin/file/add_data", // Set the url
	thumbnailWidth: 80,
	thumbnailHeight: 80,
	parallelUploads: 20,
	previewTemplate: previewTemplate,
	autoQueue: false, // Make sure the files aren't queued until manually added
	previewsContainer: "#previews", // Define the container to display the previews
	clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
})

myDropzone.on("addedfile", function (file) {
	// Hookup the start button
	file.previewElement.querySelector(".start").onclick = function () {
		myDropzone.enqueueFile(file)
	}
})

// Update the total progress bar
myDropzone.on("totaluploadprogress", function (progress) {
	document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
})

myDropzone.on("sending", function (file) {
	// Show the total progress bar when upload starts
	document.querySelector("#total-progress").style.opacity = "1"
	// And disable the start button
	file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
	file.previewElement.querySelector(".delete").setAttribute("disabled", "disabled");
	file.previewElement.querySelector(".cancel").setAttribute("disabled", "disabled");
})

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function (progress) {
	document.querySelector("#total-progress").style.opacity = "0";
	get_file();
})

myDropzone.on('error', function (file, response) {
	$(file.previewElement).find('.dz-error-message').text(response);
	console.log(response);
});

// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function () {
	myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
}
document.querySelector("#actions .cancel").onclick = function () {
	myDropzone.removeAllFiles(true)
}
// DropzoneJS Demo Code End

// blog
function delay(callback, ms){
	var timer = 0;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timer);
		timer = setTimeout(function(){
			callback.apply(context, args);
		}, ms || 0);
	}
}

$('[name="blog_title"]').keyup(delay(function (e) { 
	var text = $('[name="blog_title"]').val();
	var fixed = text.replace(/\s+/g, '-');
	if(fixed != '') {
	$('[name="blog_url"]').val(fixed);
		$('#span-url').empty();
		$('#span-url').addClass('text-info').removeClass(['text-success', 'text-danger']);
		$('#span-url').append('<i class="fa fa-spinner fa-spin"></i>');
		$.ajax({
				type: "GET",
				url: baseUrl+"admin/blog/cek_url/"+fixed,
				dataType: "JSON",
				success: function (response) {
					if (response.errorCode == 1) {
						$('#span-url').empty();
						$('#span-url').addClass('text-success').removeClass(['text-info', 'text-danger']);
						$('#span-url').append('<i class="fa fa-check"></i>');
					} else {
						$('#span-url').empty();
						$('#span-url').addClass('text-danger').removeClass(['text-info', 'text-success']);
						$('#span-url').append('<i class="fa fa-times"></i> <small>Url ada di pos lain</small>');
					}
				}
			});
	}
}, 500));

$('[name="blog_image"]').keyup(delay(function (e) { 
	$('#img-desc').attr('src', $('[name="blog_image"]').val());
}, 500));

$('#form_blog').submit(function (e) { 
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: baseUrl+"admin/blog/simpan",
		data: submit_form_data('#form_blog'),
		dataType: "JSON",
		success: function (response) {
			notify_toast(response);
			if (response.redirect == 'Y') {
				setTimeout(function(){
					window.location.href = baseUrl+'admin/blog/edit/'+response.url;
				}, 1000);
			}
		}, 
		error: function(jqXHR){
			console.log(jqXHR.responseText);
		}
	});
});
