const FormHandler = {
	showValidErrorPhone: () => {
		new Toast({
			title: false,
			text: 'Номер телефона заполнен не верно',
			theme: 'danger',
			autohide: true,
			interval: 10000,
		});
	},
	showRequiredError: () => {
		new Toast({
			title: false,
			text: 'Пожалуйста, заполните все обязательные поля',
			theme: 'danger',
			autohide: true,
			interval: 10000,
		});
	},
	showSendError: () => {
		new Toast({
			title: false,
			text: 'Ошибка отправки формы, попробуйте позже',
			theme: 'danger',
			autohide: true,
			interval: 10000,
		});
	},
	sendForm: async (form) => {
		console.log(form);

		let getRecaptchaToken = new Promise((resolve, reject) => {
			grecaptcha.ready(function () {
	            grecaptcha.execute(TOKEN_CAPTCHA, { action: 'form' }).then(function (token) {
	                resolve(token);
	            });
	        });
		});

		let error = false;
		let formData = new FormData(form[0]);
		let recaptchaToken = await getRecaptchaToken;
		formData.append('recaptcha_response', recaptchaToken);
		formData.append('url', location.href);
		formData.append('action', 'ajax_form_callback');

		form.find('.form__field-input').each(function(i) {
			if ($(this).attr('data-required') != 'Y') return false;
		    let showError = false;

		   	if ($(this).attr('type') == 'tel') {
		   		if (!Handler.validatePhone($(this).val())) {
		   			showError = true;
		   			error = true;
		   			FormHandler.showValidErrorPhone();
		   		}
		   	} else if ($(this).attr('type') == 'text') {
		   		if ($(this).val() == '') {
		   			showError = true;
		   			error = true;
		   		}
		   	}

		   	if (showError) {
		   		$(this).closest('.form__field-item').addClass('form__field-item_error');
		   	}
		});

		if (error) {
            FormHandler.showRequiredError();
            return false;
        }

		$.ajax({
            url: '/wp-admin/admin-ajax.php',
            method: "POST",
            processData: false,
            contentType: false,
            data: formData,
            dataType: 'json',
            success: function(data) {
            	if (data.status == 'success') {
            		ModalHandler.closeAll();
            		modalData = {};
            		modalData.modalId = 'thx'
            		ModalHandler.create(modalData);

                    form.trigger('reset');
            	} else {
            		FormHandler.showSendError();
            	}
            },
            error: function() {
            	FormHandler.showSendError();
            }
        });
	}
}

$(document).ready(function() {
	$(document).on('submit', '.js-form', function(e) {
		e.preventDefault();

        FormHandler.sendForm($(this));
	});

	$(document).on('change click', '.form__field-item input', function() {
		$(this).closest('.form__field-item').removeClass('form__field-item_error');
	});
});