<?php $this->layout('layout', ['title' => 'Listes des Questions']) ?>

<?php $this->start('main_content') ?>
 
<div id="wrapper_Questions">
	<div class="conteneur_L">
		<h1><?=$selectOneC['title']?></h1> 
	</div>
</div>

<div id="bloc_Questions">

		<?php 
		// on transforme les chaines de caractères contenues dans la table en tableau pour mieux gérer l'affichage
		$selectOneQ['question'] = unserialize($selectOneQ['question']) ;
		$selectOneQ['explanation'] = unserialize($selectOneQ['explanation']);
		$selectOneQ['picture'] = unserialize($selectOneQ['picture']) ;
		$selectOneQ['video'] = unserialize($selectOneQ['video']);

		// on fait une boucle for pour gérer l'affichage 
		// pas de boucle foreach, simplement une boucle for

		for ($i=0; $i < count($selectOneQ['question']) ; $i++) : 

		?>
			<div class="bloc_Question">

				<div class="questions">
					<!-- affichage en dynamique de la question -->			
					<p><?= $selectOneQ['question'][$i];?></p>
					
				</div>
				<div class="button_ComA">
					<button class="affiche_Comments" name="affiche_Comments" class="btn btn-info btn-lg">Voir commentaires</button>
				</div>
			</div>

			<div class="reponses">
				<!-- affichage en dynamique de la réponse -->
				<p><?= $selectOneQ['explanation'][$i];?></p>
				<!-- affichage en dynamique de l'image illustrant la réponse -->
				<img src="<?= $this->assetUrl('img/imgreply/'.$selectOneQ['picture'][$i])?>">
				<!-- affichage en dynamique de la vidéo illustrant la réponse -->
				<a href="<?= $selectOneQ['video'][$i]?>" target="_blank">Cliquez ici pour voir la réponse en vidéo</a>

			</div>
			
		<?php endfor; ?>

	<div class="clear"></div>
	
</div>

<div class="clear"></div>

	<div class="comment_S">


		<div class="button_Com2">
			<button id="masquer_Comments" name="masquer_Comments" class="btn btn-info btn-lg">Masquer</button>
			<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Déposer Commentaire</button>		
		</div>


		<div class="list_Comments">
			<p>
				!! oniqseubngv lijqsbvlkj qdsbvlkqdjv bljeqgfrqj m sdvbmrjfffzeombf oqIEUFH XPQZOEUCFRH PRUFHC EGOPICH ¨PIH ià hoîhdf poscdhidgo pfihg dvoifhg xcdiopfhc gdpfogich dfopichg egfioph djoh do^gkhse cr^gioph egpbdegtiu bfgviuc eiugcb ibfr ericbh fsjisjisjisjiqhoer îcgh jogch erophj cpiuerh xcpoerch eropch peroiht cqskomh mocghilg pcruiohe cpoisdufh vpcoeruifh tpoergh veocfhdrhiog cqsjodf mgh opserihjvte oniqseubngv lijqsbvlkj qdsbvlkqdjv bljeqgfrqj m sdvbmrjfffzeombf oqIEUFH XPQZOEUCFRH PRUFHC EGOPICH ¨PIH ià hoîhdf poscdhidgo pfihg dvoifhg xcdiopfhc gdpfogich dfopichg egfioph djoh do^gkhse cr^gioph egpbdegtiu bfgviuc eiugcb ibfr ericbh fsjisjisjisjiqhoer îcgh jogch erophj cpiuerh xcpoerch eropch peroiht cqskomh mocghilg pcruiohe cpoisdufh vpcoeruifh tpoergh veocfhdrhiog cqsjodf mgh opserihjvte !!
			</p>
		</div>

	</div>


	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Déposer un commentaire</h4>
				</div>

				<?php if(isset($errors) && !empty($errors)):?> 
					<div class="alert alert-danger">
						<?=implode('<br>', $errors); ?>
					</div>
				<?php endif; ?>

				<?php if(isset($success) && $success == true):?>
					<div class="alert alert-success">
						Votre message a bien été enregistré !
					</div>
				<?php endif; ?>

				<div class="modal-body">
					<form class="form-horizontal" method="POST">

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="username">Pseudo</label>  
							<div class="col-md-4">
								<input id="username" name="username" type="text" placeholder="" class="form-control input-md">
							</div>
						</div>

									<!-- Textarea -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="message">Message</label>
							<div class="col-md-4">                     
								<textarea class="form-control" id="message" name="message"></textarea>
							</div>
						</div>

									<!-- Button -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="envoyer"></label>
							<div class="col-md-4">
								<button id="envoyer" name="envoyer" class="btn btn-primary">Envoyer</button>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				</div>
			</div>
		</div>
	</div>


</div>


<?php $this->stop('main_content') ?>

<?php $this->start('css') ?>
<style>
.conteneur_L{
	background-image: url("<?=$this->assetUrl('img/illustrations/'.$selectOneC['illustration'])?>");
}

</style>
<?php $this->stop('css') ?>

		






