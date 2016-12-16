
$(document).ready(function() {
	$('.questions').click(function() {
		$('.reponses').slideToggle('slow');
	});
	
});

$(document).ready(function() {
	$('.affiche_Comments').click(function(){
		$('.comment_S').slideToggle('slow');
	});
	$('#masquer_Comments').click(function(){
		$('.comment_S').hide();
	});
});

$(document).ready(function() {
	$('.ajout_Comments').click(function(){
		$('.depot_Comment').slideToggle('slow');
		$('.comment_S').slideToggle('slow');
	});
});
