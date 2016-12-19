<?php $this->layout('layout', ['title' => 'Listes des Questions']) ?>

<?php $this->start('main_content') ?>


<div id="wrapper_Questions">

		<div class="col-md-1 back retour">
			 <a href="<?= $this->url('categories_category') ?>">
			 <input id="toto" type="button" class="btn style-reset start" value="Retour"> 
			 </a>
		</div>      

	<div class="conteneur_L">
		<h1>- <?=$selectOneC['title']?> -</h1>
	</div>

		<div class="bloc_nav_opacity"></div> 
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

		for ($i=0; $i < count($selectOneQ['question']) ; $i++) : ?>

		

			<div class="bloc_Question">

				<div class="questions">
					<!-- affichage en dynamique de la question -->			
					<p><?= $selectOneQ['question'][$i];?></p>
					
				</div>
			</div>

			<div class="reponses" style="display:none;">
				<!-- affichage en dynamique de la réponse -->
				<p><?= $selectOneQ['explanation'][$i];?></p>
				<!-- affichage en dynamique de l'image illustrant la réponse -->
				<img id="img_perso" src="<?= $this->assetUrl('img/imgreply/'.$selectOneQ['picture'][$i])?>">
				<!-- affichage en dynamique de la vidéo illustrant la réponse -->
				<div class="bloc_lien-reponse">
					<div class="lien-reponse">
						<a href="<?= $selectOneQ['video'][$i]?>" target="_blank">Voir la réponse en vidéo</a>

						<div class="lien-reponse">
							<a class="affiche_Comments" href="<?=$this->url('commentaires_commentaires', ['id' => $selectOneC['id']]);?>">Voir commentaires</a>
						</div>
					</div>
				</div>
			</div>

		<?php endfor; ?>
</div>



<?php $this->stop('main_content') ?>

<?php $this->start('css') ?>
<style>
	.conteneur_L{
		background-image: url("<?=$this->assetUrl('img/illustrations/'.$selectOneC['illustration'])?>");
	}

</style>
<?php $this->stop('css') ?>

		







