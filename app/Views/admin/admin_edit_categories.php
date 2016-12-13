<?php $this->layout('layout_back', ['title' => 'Modifier une catégorie']) ?>

<?php $this->start('main_content') ?>

	<div class="text-center">
		<p class="text-connect">Modifier une catégorie</p>
	</div>
	<br>

	<form class="form-horizontal" method="post">

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="title">Nom de la catégorie</label>  
			<div class="col-md-4">
				<input id="title" name="title" placeholder="dynamique" class="form-control input-md" type="text">    
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

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="question">Question $i</label>  
			<div class="col-md-4">
				<input id="question" name="question" placeholder="" class="form-control input-md" type="text">   
			</div>
		</div>

		<!-- Textarea -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="explanation">Réponse $i</label>
			<div class="col-md-4">                     
				<textarea class="form-control" id="explanation" name="explanation"></textarea>
			</div>
		</div>

		<!-- pour ajouter une question et réponse -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="add-question">Ajouter une question</label>
			<div class="col-md-4 add-question">                 
				<i class="fa fa-2x fa-plus" aria-hidden="true"></i>
			</div>
		</div>

		<!-- Button -->
		<div class="form-group">
			<label class="col-md-4 control-label" for=""></label>
			<div class="col-md-4">
				<button id="" name="" class="btn btn-info center-block">Modifier la catégorie</button>
			</div>
		</div>


	</form>


	
<?php $this->stop('main_content') ?>