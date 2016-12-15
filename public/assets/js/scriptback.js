$(document).ready(function(){
	$( "#reply" ).click(function() {
  		$( "#input-reply" ).slideDown("slow");
	});
	$( "#delete" ).click(function() {
  		$( "#select-delete" ).slideToggle ("slow");
	});
});