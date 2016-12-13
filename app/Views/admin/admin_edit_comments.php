<?php $this->layout('layout_back', ['title' => 'Gestion des commentaires']) ?>

<?php $this->start('main_content') ?>

	<div class="text-center">
		<p class="text-connect">Gestion des commentaires</p>
	</div>
	<br>

	<p class="text-info">Vous avez $i de commentaires à modérer</p>

	<table class="table table-hover">
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Commentaires</th>
				<th class="text-center" colspan="3">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<p class="td-fusion click-action">$id</p>
				</td>
				<td>
					<p class="td-fusion click-action">Vous êtes génaiaux c'est génial</p>
				</td>
				
				<td> 
					<div class="click-action text-success">				
						<i class="fa fa-check" aria-hidden="true"></i>
						&nbsp;Valider
					</div>
				</td>
				<td>
					<div class="center-block click-action text-primary" id="reply">
						<i class="fa fa-reply" aria-hidden="true"></i>
						&nbsp;Répondre
					</div>
					<form id="input-reply">
						<textarea class="form-control input-margin" type="text" name="reply"></textarea>
						<button class="btn btn-primary btn-sm input-margin center-block" type="submit">Envoyer</button>
					</form>
					
				</td>
				<td>
					<div class="center-block click-action text-danger" id="delete">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
						&nbsp;Supprimer
					</div>
					<form id="select-delete">
						<select class="form-control input-margin">
							<option value="0" disabled selected>Préciser la raison</option>
							<option>Propos injurieux</option>
							<option>Propos hors sujet</option>
						</select>
						<button class="btn btn-danger btn-sm center-block input-margin" id="button-delete" type="submit">Supprimer</button>
					</form>
					
				</td>						
			</tr>			
			<tr>
				<td>$id </td>
				<td>Vous êtes génaiaux c'est génial</td>
				<td>				
					<i class="fa fa-check" aria-hidden="true"></i>&nbsp;Valider</td>
					<td>
					<i class="fa fa-reply" aria-hidden="true"></i>&nbsp;Répondre</td>
					<td>
					<i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Supprimer</td>
				</td>
			</tr>
		</tbody>
	</table>

	<br>
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
					<form>
						<select class="form-control">
							<option value="0" disabled selected>Catégories</option>
							<option>les noms des categ dyn</option>
						</select>
					</form>
				</th>
				<th class="text-center">Commentaires</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Si pas de séleciton categ on affiche tous selectall</td>
				<td>Je ne voudrais pas rentrer dans des choses trop dimensionnelles, mais, premièrement, il faut toute la splendeur du aware car l'aboutissement de l'instinct, c'est l'amour ! Et j'ai toujours grandi parmi les chiens. </td>
			</tr>
		</tbody>
	</table>


	
<?php $this->stop('main_content') ?>