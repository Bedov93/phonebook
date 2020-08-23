function auth(form) {
	$.ajax({
		type: 'POST',
		url: '/main/login',
		data:  {
			'login': form.login.value,
			'password':form.password.value
		},
		dataType: "json",
		success: function(data, textStatus){
			if(data.status == "true"){
				location.reload(true);
			} else if(data.status = "false"){
				$("#falseStatus").css("display","block");
				$("#falseStatus").delay(4000).fadeOut("slow", function () { $(this).css("display","none"); });
			}
		}
	});
	return false;
}
$(document).ready(function() {

		// Check if JavaScript is enabled
		$('body').addClass('js');

	// Make the checkbox checked on load
	$('.login-form span').addClass('checked').children('input').attr('checked', true);

	// Click function
	$('.login-form span').on('click', function() {

		if ($(this).children('input').attr('checked')) {
			$(this).children('input').attr('checked', false);
			$(this).removeClass('checked');
		}

		else {
			$(this).children('input').attr('checked', true);
			$(this).addClass('checked');
		}
	});
});