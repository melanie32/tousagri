
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
});

$(document).ready(function() {
	$('.affiche_Comments').click(function(){
		$('.comment_S').slideToggle('slow');
	});
	$('.masquer_Comments').click(function(){
		$('.comment_S').hide();
	});
});

$(document).ready(function() {
	$('.ajout_Comments').click(function(){
		$('.depot_Comment').slideToggle('slow');
		$('.comment_S').slideToggle('slow');
	});
});
