
$(document).ready(function() {
	$('#question_1').click(function() {
		$('#reponse_1').slideToggle('slow');
	});
	$('#question_2').click(function() {
		$('#reponse_2').slideToggle('slow');
	});
	$('#question_3').click(function() {
		$('#reponse_3').slideToggle('slow');
	});
	$('#question_4').click(function() {
		$('#reponse_4').slideToggle('slow');
	});
	$('.button_Comment').click(function() {
		$('.list_Comments').slideToggle('slow');
	});
});

