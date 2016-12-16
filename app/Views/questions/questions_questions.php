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

		?>
			<div class="bloc_Question">

				<div class="questions">
					<!-- affichage en dynamique de la question -->			
					<p><?= $selectOneQ['question'][$i];?></p>
					
				</div>
				<div class="button_ComA">
					<a href="<?=$this->url('commentaires_commentaires', ['id' => $selectOneC['id']]);?>">
						<button class="affiche_Comments" name="affiche_Comments" class="btn btn-info btn-lg">Voir commentaires</button>
					</a>
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


<?php $this->stop('main_content') ?>

<?php $this->start('css') ?>
<style>
	.conteneur_L{
		background-image: url("<?=$this->assetUrl('img/illustrations/'.$selectOneC['illustration'])?>");
	}

</style>
<?php $this->stop('css') ?>

		






