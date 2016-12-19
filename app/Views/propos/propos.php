<?php $this->layout('layout', ['title' => 'A propos']) ?>

<?php $this->start('main_content') ?>

<div id="wrapper_Mentions">
		<div class="col-md-1 back retour">
			 <a href="<?= $this->url('categories_category') ?>">
			 <input id="toto" type="button" class="btn style-reset start" value="Retour"> 
			 </a>
		</div>


		<div class="title_conteneur_L">
			<h1>- A Propos -</h1>
		</div>

	<div class="bloc_nav_opacity"></div> 
</div>
<div id="bloc_mentions">
<h2>Tout commence au 66 Rue de l'abbée de l'épée...</h2>
	<p>A-Propos Langues® est un organisme de formation en langues, certifié NF214, et dispose d’un service de traduction. Nous sommes spécialisés dans les services linguistiques sur mesure et de qualité, pour les entreprises et les administrations.<br>
	Depuis 1997, A-Propos Langues® s'est forgé une solide réputation basée sur son professionnalisme et son esprit d'innovation. Nos solutions de formation, de traduction et de séjours linguistiques en 35 langues regroupent tous les aspects linguistiques, culturels et technologiques afin d’apporter des réponses concrètes.<br>
	Parce que le monde est en perpétuelle mutation, A-Propos Langues® investit continuellement dans la recherche pédagogique et technologique.</p>
</div>


<?php $this->stop('main_content') ?>

<?php $this->start('css') ?>
<style>
	.title_conteneur_L{
		background-image: url("<?=$this->assetUrl('img/equipe.jpg')?>");
	}

</style>
<?php $this->stop('css') ?>