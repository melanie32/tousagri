<?php $this->layout('layout_back', ['title' => 'Modifier une catégorie']) ?>

<?php $this->start('main_content') ?>

	<?php if(isset($errors) && !empty($errors)):?> 
		<div class="alert alert-danger">
			<?=implode('<br>', $errors); ?>
		</div>
	<?php endif; ?>

	<?php if(isset($success) && $success == true):?>
		<div class="alert alert-success">
			Votre catégorie a bien été modifiée !
		</div>
	<?php endif; ?>

	<div class="text-center">
		<p class="text-connect">Modifier une catégorie</p>
	</div>
	<br>


	<form class="form-horizontal" method="post" enctype="multipart/form-data">

	<input type="hidden" name="id-category" value="<?=$selectOneC['id']?>">

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="title">Nom de la catégorie</label>  
			<div class="col-md-4">
				<input id="title" name="title" placeholder="dynamique" class="form-control input-md" type="text" value="<?=$selectOneC['title']?>">    
			</div>
		</div>

		<!-- File Button --> 
		<div class="form-group">
			<label class="col-md-4 control-label" for="pictogram">Pictogramme</label>
			<div class="col-md-4">
				<input id="pictogram" name="pictogram" class="input-file" type="file">
				<div>
					<br>
					<p>Pictogramme actuel</p>
					<img id="display-picto-back" src="<?= $this->assetUrl('img/pictos/'.$selectOneC['pictogram'])?>">					
				</div>
			</div>
		</div>

		<!-- File Button --> 
		<div class="form-group">
			<label class="col-md-4 control-label" for="illustration">Illustration (photo)</label>
			<div class="col-md-4">
				<input id="illustration" name="illustration" class="input-file" type="file">
				<div>
					<br>
					<p>Ilustration actuelle</p>
					<img id="display-illus-back" src="<?= $this->assetUrl('img/illustrations/'.$selectOneC['illustration'])?>">	
				</div>				
			</div>
		</div>


		<table class="table">
			<thead>
				<tr>
					
					<th>Question</th>
					<th>Réponse</th>
					<th>Illustation de la réponse</th>
					
				</tr>
			</thead>
			<tbody id="new-input">
			
			<?php 
				$selectOneQ['explanation'] = unserialize($selectOneQ['explanation']);
				$selectOneQ['question'] = unserialize($selectOneQ['question']) ;
				$selectOneQ['picture'] = unserialize($selectOneQ['picture']) ;
				$selectOneQ['video'] = unserialize($selectOneQ['video']);


				for ($i=0; $i < count($selectOneQ['explanation']) ; $i++) : 
				$selectOneQ['picture'][$i] = (empty($selectOneQ['picture'][$i]))? 'picture_5852ea2e9ff7f.jpg' : $selectOneQ['picture'][$i];
			?>
				<tr>
					
					<td id="input-question">
						<input type="hidden" name="id-question" value="<?=$selectOneQ['id']?>">
						<input id="question" name="question[]" class="form-control input-md" type="text" value="<?=$selectOneQ['question'][$i]?>">		
					</td>
					<td>
						<textarea rows="7" cols="50" class="form-control" id="explanation" name="explanation[]"><?=$selectOneQ['explanation'][$i]?></textarea>
					</td>
					<td>
						<div>					
							<p><b>Illustration actuelle de la réponse (image et/ ou vidéo)</b></p>
							<img id="display-picture-answer-back" src="<?= $this->assetUrl('img/imgreply/'.$selectOneQ['picture'][$i])?>">	
							<br>
							<label>Changer l'illustration:</label><br><input type="file" name="picture[]">
							<br>
							<a href="<?= $selectOneQ['video'][$i]?>" target="_blank">Cliquez ici pour voir la vidéo actuelle</a>	
							<br>
							<label>Ajouter une nouvelle URL vidéo:</label><br><input type="text" name="video[]">			
						</div> 
					</td>
					
				</tr>
			<?php endfor; ?>
				
			</tbody>
		</table>


		
		<!-- pour ajouter une question et réponse -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="add-question">Ajouter</label>
			<div class="col-md-4">                 
				<i id="addinput" class="fa fa-2x fa-plus" aria-hidden="true"></i>
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