$(document).ready(function(){

	$( "#reply" ).click(function() {
  		$( "#input-reply" ).slideDown("slow");
	});

	$( "#delete" ).click(function() {
  		$( "#select-delete" ).slideToggle ("slow");
	}); 
	/*pour la page modifier les catégories*/
	$('#addinput').click(function() {
		var newinput = '<td class="input-question"><textarea rows="7" cols="25" class="form-control input-md" type="text" name="question[]" required></textarea></td>';
		newinput += '<td><textarea rows="14" cols="50" name="explanation[]" class="form-control" id="explanation" required></textarea></td>';
		newinput += '<td class="input-question"><label>Ajouter une image:</label><br><input class="input-file" type="file" name="picture[]"><br>';
		newinput += '<label>Ajouter une URL vidéo:</label><br><input type="text" name="video[]" class="input-styl-border"></td>';
		
		$('#new-input').append('<tr id="newinputQ">'+newinput+'</tr>'); 	
	});

	$('#removeinput').click(function() {
		$('#newinputQ').remove();

	});
	
	/*pour la page ajouter une catégorie*/ 
	$('#addQuestionCateg').click(function() {
		var newinputAddCateg = '<td><textarea rows="7" cols="25" class="form-control input-md" type="text" name="question[]" required></textarea></td>';
		newinputAddCateg += '<td><textarea rows="7" cols="50" name="explanation[]" class="form-control" id="explanation" required></textarea></td>';
		newinputAddCateg += '<td class="input-questionadd"><label>Ajouter une image:</label><br><input class="input-file" type="file" name="picture[]"><br>';
		newinputAddCateg += '<label>Ajouter une URL vidéo:</label><br><input type="text" name="video[]" class="input-styl-border"></td>';

		$('#group-input-add-c').append('<tr id="newinputQ">'+newinputAddCateg+'</tr>');
	});  

	$('#removeinputC').click(function() {
		$('#newinputQ').remove();

	});
	
	

});

 