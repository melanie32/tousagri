<?php $this->layout('layout_back', ['title' => 'Gestion des commentaires']) ?>

<?php $this->start('main_content') ?>

	<div class="text-center">
		<p class="text-connect">Commentaires à modérer</p>
	</div>
	<br>

	<div id="resultAjax"></div>

	

	<table class="table table-hover">
		<thead>
			<tr>
				<th class="text-center">Pseudo</th>
				<th class="text-center">Catégorie</th>
				<th class="text-center">Commentaires</th>
				<th class="text-center" colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if(empty($selectCommentV)) :?>
				
					<td colspan="4" class="text-center">
						<p>Vous n'avez pas de commentaires à modérer</p>
					</td>
				
			<?php else: ?>
			<?php foreach ($selectCommentV as $selectComment) :?>
				<tr>
					<td>
						<p class="td-fusion click-action"><?=$selectComment['username']?></p>
					</td>
					<td>
							<p class="td-fusion click-action"><?=$selectComment['title']?></p>
					</td>
					<td class="contentACollect">
							<p class="td-fusion click-action"><?=$selectComment['content']?></p>
					</td>

				<form method="post">
					<td> 
						<div class="click-action text-success">
											
							<button class="btn btn-success" type="submit" id="valid" data-id="<?=$selectComment['id'];?>">
							<i class="fa fa-check" aria-hidden="true"></i>
							Valider</button>
						</div>
					</td>
					
					<td>
						<div class="center-block click-action text-danger">
							<button class="btn btn-danger" type="submit" id="delete" data-id="<?=$selectComment['id'];?>">
							<i class="fa fa-trash-o" aria-hidden="true"></i>
							Supprimer</button>
						</div>
					</td>

				</form>						
				</tr>			
			<?php endforeach; ?>	
			<?php endif; ?>		
		</tbody>
	</table>

	
	<hr>
	<br>

	<div class="text-center">
		<p class="text-connect">Liste des commentaires</p>
	</div>
	<br>

	<table class="table table-hover">
		<thead>
			<tr>
				<th class="text-center">
					
						<select class="form-control">
							<option value="0" disabled selected>Catégories</option>
							<option>les noms des categ dyn</option>
						</select>
					
				</th>
				<th class="text-center">Commentaires</th>
			</tr>
		</thead>
		<tbody id="commValidOk">
		<?php if(empty($selectCommentOk)) :?>
			<td colspan="4" class="text-center">
				<p>Vous n'avez pas encore de commentaires</p>
			</td>
		<?php else:  ?>
		<?php foreach ($selectCommentOk as $selectComment) :?>
			<tr>
				<td><?=$selectComment['title']?></td>
				<td><?=$selectComment['content']?></td>
			</tr>
		<?php endforeach; ?>
		<?php endif; ?>
		</tbody>
	</table>



	
<?php $this->stop('main_content') ?>


<?php $this->start('script') ?>

<script>
$(document).ready(function(){

	$('#valid').click(function(e){
		 
		var ajaxCom = $(this).data('id');

		var tr = $(this).parent().parent().parent();
		
		
		e.preventDefault();
		$.ajax({
			url: '<?=$this->url('admin_edit_new_comments');?>',
			// ici on utilise la methode $this pour donner l'url et on y met la route (4ème paramètre de la route du fichier)
			type:'post',
			cache:false,
			data: {id:ajaxCom},
			dataType: 'json',
			success: function(result){
				if(result.code == 'ok'){
					//ici result correpond à mon tableau json de la ma page AjaxController
					//showjson(['code=>'ok', 'msg'=>'blabla']);
					$('#resultAjax').html('<div class="alert alert-success">' + result.msg +'</div>')
					$(tr).remove();
					
				}
				else if(result.code =='error'){
					$('#resultAjax').html('<div class="alert alert-danger">' + result.msg +'</div>');
				}

			}//fermeture succees

		});//fermeture $.ajax

	});// fermeture buttton clic

	$('#delete').click(function(e){
		var ajaxCom = $(this).data('id');
		
		var tr = $(this).parent().parent().parent();
		
		
		e.preventDefault();
		$.ajax({
			url: '<?=$this->url('admin_edit_del_comments');?>',
			// ici on utilise la methode $this pour donner l'url et on y met la route (4ème paramètre de la route du fichier)
			type:'post',
			cache:false,
			data: {id:ajaxCom},
			dataType: 'json',
			success: function(result){
				if(result.code == 'ok'){
					//ici result correpond à mon tableau json de la ma page AjaxController
					//showjson(['code=>'ok', 'msg'=>'blabla']);
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