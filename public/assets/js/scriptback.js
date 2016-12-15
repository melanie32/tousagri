$(document).ready(function(){
	$( "#reply" ).click(function() {
  		$( "#input-reply" ).slideDown("slow");
	});
	$( "#delete" ).click(function() {
  		$( "#select-delete" ).slideToggle ("slow");
	});    
	$('#addinput').click(function() {
		var newinput = '<td><input class="form-control input-md" type="text" name="question[]"></td>';
		newinput += '<td><textarea rows="7" cols="50" name="explanation[]" class="form-control" id="explanation"></textarea></td>';
		newinput += '<td><label>Ajouter une image:</label><br><input type="file" name="picture[]"><br>';
		newinput += '<label>Ajouter une URL vidéo:</label><br><input type="text" name="video[]"></td>';
		
		$('#new-input').append('<tr>'+newinput+'</tr>'); 
	
	});    
});

 