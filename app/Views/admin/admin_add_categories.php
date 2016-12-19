<?php $this->layout('layout_back', ['title' => 'Ajouter une catégorie']) ?>

<?php $this->start('main_content') ?>    

	<?php if(isset($errors) && !empty($errors)):?> 
		<div class="alert alert-danger">
			<?=implode('<br>', $errors); ?>
		</div>
	<?php endif; ?>

	<?php if(isset($success) && $success == true):?>
		<div class="alert alert-success">
			Votre catégorie a bien été ajoutée !
		</div>
	<?php endif; ?>
 
	<div class="text-center">
		<p class="text-connect text-center">Ajouter une catégorie</p>
	</div>
	<br>

	<form class="form-horizontal" method="post" enctype="multipart/form-data">

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="title">Nom de la catégorie</label>  
			<div class="col-md-4">
				<input id="title" name="title" placeholder="" class="form-control input-md" type="text" required>    
			</div>
		</div>

		<!-- File Button --> 
		<div class="form-group">
			<label class="col-md-4 control-label" for="pictogram">Pictogramme</label>
			<div class="col-md-4">
				<input id="pictogram" name="pictogram" class="input-file" type="file">
			</div>
		</div>

		<!-- File Button --> 
		<div class="form-group">
			<label class="col-md-4 control-label" for="illustration">Illustration (photo)</label>
			<div class="col-md-4">
				<input id="illustration" name="illustration" class="input-file" type="file">
			</div>
		</div>

		<br>
		
		<br>


		<table class="table">
			<thead>
				<tr>
					
					<th>Question</th>
					<th>Réponse</th>
					<th>Illustration de la réponse</th>
					
				</tr>
			</thead>
			<tbody id="group-input-add-c">			
				
				<tr>							
					<td id="input-question">
						
						<input id="question" name="question[]" class="form-control input-md" type="text">		
					</td>
					<td>
						<textarea rows="7" cols="50" class="form-control" id="explanation" name="explanation[]"></textarea>
					</td>
					<td>
						<div>			
							<label>Ajouter une illustration:</label>
							<br>
							<input type="file" name="picture[]">
							<br>
							<label>Ajouter une URL vidéo (youtube):</label>
							<br>
							<input type="text" name="video[]">			
						</div> 
					</td>							
				</tr>
					
					
			</tbody>
		</table>		


		<!-- pour ajouter ou supprimer les input une question et réponse -->
		<div class="center-block">			
			<button type="button" class="btn btn-default" aria-label="Left Align" id="addQuestionCateg">
  				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</button>
			
			<button type="button" class="btn btn-default" aria-label="Left Align" id="removeinputC">
  				<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			</button>
		</div>


		<!-- Button -->
		<div class="form-group">
			<label class="col-md-4 control-label" for=""></label>
			<div class="col-md-4">
			<button id="" name="" class="btn btn-info center-block">Ajouter la catégorie</button>
			</div>
		</div>


	</form>


	
<?php $this->stop('main_content') ?>