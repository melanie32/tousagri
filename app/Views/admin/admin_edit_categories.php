<?php $this->layout('layout_back', ['title' => 'Modifier une catégorie']) ?> 

<?php $this->start('main_content') ?>
 
	<?php if(isset($errors) && !empty($errors)):?> 
		<div class="alert alert-danger">
			<?=implode('<br>', $errors); ?>
		</div>
	<?php endif; ?>

	<?php if(isset($success) && $success == true):?>
		<div class="alert alert-success">
			Votre catégorie a bien été mise à jour !
		</div>
	<?php endif; ?>

	<div id="resultAjax"></div>

	<div class="text-center">
		<p class="text-connect">
			<i class="fa fa-wrench" aria-hidden="true"></i>
			&nbsp;MODIFIER LA CATEGORIE&nbsp;&nbsp;
			<br>
			<span class="title-update"><?=ucfirst(strtolower($selectOneC['title']))?></span>
		</p>
	</div>
	<br>


	<form class="form-horizontal" method="post" enctype="multipart/form-data">

	<input type="hidden" name="id-category" value="<?=$selectOneC['id']?>">


		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="title">Nom de la catégorie</label>  
			<div class="col-md-4">
				<input id="title" name="title" placeholder="dynamique" class="form-control input-md input-styl-border" type="text" value="<?=$selectOneC['title']?>">    
			</div>
		</div>

		<!-- File Button --> 
		<div class="form-group">
			<label class="col-md-4 control-label" for="pictogram">Pictogramme</label>
			<div class="col-md-4">
				<input id="pictogram" name="pictogram" class="input-file" type="file">
				<div class="text-center">
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
				<div class="text-center">
					<br>
					<p>Ilustration actuelle</p>
					<img id="display-illus-back" src="<?= $this->assetUrl('img/illustrations/'.$selectOneC['illustration'])?>">	
				</div>				
			</div>
		</div>

		<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>					
					<th>Question</th>
					<th>Réponse</th>
					<th>Illustration de la réponse</th>					
				</tr>
			</thead>
			<tbody id="new-input">
			
				<?php 
					$selectOneQ['explanation'] = unserialize($selectOneQ['explanation']);
					$selectOneQ['question'] = unserialize($selectOneQ['question']) ;
					$selectOneQ['picture'] = unserialize($selectOneQ['picture']) ;
					$selectOneQ['video'] = unserialize($selectOneQ['video']);


					for ($i=0; $i < count($selectOneQ['explanation']) ; $i++) : 

					$selectOneQ['picture'][$i] = (empty($selectOneQ['picture'][$i]))? 'no_image.svg.png' : $selectOneQ['picture'][$i];
				?>
						<tr>							
							<td class="input-question">
								<input type="hidden" name="id-question" value="<?=$selectOneQ['id']?>">
								<textarea rows="7" cols="25" id="question" name="question[]" class="form-control input-md input-styl-border" type="text"><?=$selectOneQ['question'][$i]?></textarea>
																
								<button type="button" class="btn btn-warning delete-questions" aria-label="Left Align" data-id="<?=$i?>">
  									<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>&nbsp;Supprimer cette question
								</button>
									
							</td>
							<td>
								<textarea rows="14" cols="50" class="form-control input-styl-border" id="explanation" name="explanation[]"><?=$selectOneQ['explanation'][$i]?></textarea>
							</td>
							<td class="input-question">												
								<p><b>Illustration actuelle de la réponse (image et/ ou vidéo)</b></p>
								<img id="display-picture-answer-back" src="<?= $this->assetUrl('img/imgreply/'.$selectOneQ['picture'][$i])?>">	
								
								<label>Changer l'illustration:</label>
								
								<input class="input-file" type="file" name="picture[]">
								
								<?php if(empty($selectOneQ['video'][$i])):?>
									<span>Il n'y a pas de vidéo pour cette question.</span>
								<?php else: ?>
									<a href="<?= $selectOneQ['video'][$i]?>" target="_blank">Cliquez ici pour voir la vidéo actuelle</a>
								<?php endif;?>	
								
								<label>Ajouter une nouvelle URL vidéo:</label>
								
								<input type="text" name="video[]" class="input-styl-border">							
							</td>							
						</tr>
					<?php endfor; ?>
					
			</tbody>
		</table>
		</div>


		
		
		<!-- pour ajouter ou supprimer les input une question et réponse -->
		<div class="text-center">			
			<button type="button" class="btn btn-info" aria-label="Left Align" id="addinput">
  				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</button>
			
			<button type="button" class="btn btn-danger" aria-label="Left Align" id="removeinput">
  				<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			</button>
		</div>
		<br>

		

		<!-- Button -->
		<div class="form-group">
			<label class="col-md-4 control-label" for=""></label>
			<div class="col-md-4">
				<button id="" name="" class="btn btn-lg btn-info center-block">MISE A JOUR</button>
			</div>
		</div>


	</form>


	
<?php $this->stop('main_content') ?>

<?php $this->start('script') ?>

<script>
$(document).ready(function(){
	$('.delete-questions').click(function(e){

		var ajaxCom = $(this).attr('data-id');
		
		var tr = $(this).parent().parent();
	
		
		e.preventDefault();
		$.ajax({
			url: '<?=$this->url('admin_del_questions');?>',
			// ici on utilise la methode $this pour donner l'url et on y met la route (4ème paramètre de la route du fichier)
			type:'post',
			cache:false,
			data: {id:<?=$selectOneC['id']?>,i:ajaxCom},
			dataType: 'json',
			success: function(result){
				if(result.code == 'ok'){
					
					$('#resultAjax').html('<div class="alert alert-success">' + result.msg +'</div>')
					$(tr).remove();
					
				}
				else if(result.code =='error'){
					$('#resultAjax').html('<div class="alert alert-danger">' + result.msg +'</div>');
				}

			}//fermeture succees

		});//fermeture $.ajax

	});// fermeture buttton clic
});
</script>

<?php $this->stop('script') ?>