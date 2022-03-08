function notify_toast(response){
	if(response.errorCode == 1) {
		$(document).Toasts('create', {
			class: 'bg-success',
			title: 'Notification',
			subtitle: '',
			autohide: true,
			delay: 3000,
			body: response.errorMessage
		});
	} else {
		$(document).Toasts('create', {
			class: 'bg-warning',
			title: 'Notification',
			subtitle: '',
			autohide: true,
			delay: 3000,
			body: response.errorMessage
		});
	}
}
