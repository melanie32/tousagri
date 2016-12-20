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
		<p class="text-connect">
			<i class="fa fa-plus" aria-hidden="true"></i>
			&nbsp;AJOUTER UNE CATEGORIE			
		</p>
	</div>
	<br>
	


	<form class="form-horizontal" method="post" enctype="multipart/form-data">

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="title">Nom de la catégorie</label>  
			<div class="col-md-4">
				<input id="title" name="title" placeholder="" class="form-control input-md input-styl-border" type="text" required>    
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

		<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					
					<th>Question</th>
					<th>Réponse</th>
					<th>Illustration de la réponse</th>
					
				</tr>
			</thead>
			<tbody id="group-input-add-c">			
				
				<tr>							
					<td class="input-questionadd">
						
						<textarea rows="7" cols="25" id="question" name="question[]" class="form-control input-md input-styl-border"></textarea>	
					</td>
					<td>
						<textarea rows="7" cols="50" class="form-control input-styl-border" id="explanation" name="explanation[]"></textarea>
					</td>
					<td class="input-questionadd">							
						<label>Ajouter une illustration:</label>
						
						<input type="file" name="picture[]" class="input-file">
						
						<label>Ajouter une URL vidéo (youtube):</label>
						
						<input type="text" name="video[]" class="input-styl-border">			
						
					</td>							
				</tr>
					
					
			</tbody>
		</table>		
		</div>

		<!-- pour ajouter ou supprimer les input une question et réponse -->
		<div class="text-center">			
			<button type="button" class="btn btn-info" aria-label="Left Align" id="addQuestionCateg">
  				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</button>
			
			<button type="button" class="btn btn-danger" aria-label="Left Align" id="removeinputC">
  				<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			</button>
		</div>
		<br>

		<!-- Button -->
		<div class="form-group">
			<label class="col-md-4 control-label" for=""></label>
			<div class="col-md-4">
			<button id="" name="" class="btn btn-lg btn-info center-block">AJOUTER</button>
			</div>
		</div>


	</form>


	
<?php $this->stop('main_content') ?>