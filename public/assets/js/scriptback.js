$(document).ready(function(){

	$( "#reply" ).click(function() {
  		$( "#input-reply" ).slideDown("slow");
	});

	$( "#delete" ).click(function() {
  		$( "#select-delete" ).slideToggle ("slow");
	}); 
	/*pour la page modifier les catégories*/
	$('#addinput').click(function() {
		var newinput = '<td><input class="form-control input-md" type="text" name="question[]" required></td>';
		newinput += '<td><textarea rows="7" cols="50" name="explanation[]" class="form-control" id="explanation" required></textarea></td>';
		newinput += '<td><label>Ajouter une image:</label><br><input type="file" name="picture[]" required><br>';
		newinput += '<label>Ajouter une URL vidéo:</label><br><input type="text" name="video[]" required></td>';
		
		$('#new-input').append('<tr id="newinputQ">'+newinput+'</tr>'); 	
	});

	$('#removeinput').click(function() {
		$('#newinputQ').remove();

	});
	
	/*pour la page ajouter une catégorie*/ 
	$('#addQuestionCateg').click(function() {
		var newinputAddCateg = '<td><input class="form-control input-md" type="text" name="question[]" required></td>';
		newinputAddCateg += '<td><textarea rows="7" cols="50" name="explanation[]" class="form-control" id="explanation" required></textarea></td>';
		newinputAddCateg += '<td><label>Ajouter une image:</label><br><input type="file" name="picture[]"><br>';
		newinputAddCateg += '<label>Ajouter une URL vidéo:</label><br><input type="text" name="video[]"></td>';

		$('#group-input-add-c').append('<tr id="newinputQ">'+newinputAddCateg+'</tr>');
	});  

	$('#removeinputC').click(function() {
		$('#newinputQ').remove();

	});
	
	

});

 