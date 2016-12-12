<?php $this->layout('layout_front', ['title' => 'Listes des Questions']) ?>

<?php $this->start('main_content') ?>

<div id="wrapper_Questions">
	<div class="conteneur_L">
		<div id="nav_Category">
			<ul>
				<li>Viande</li>
				<li>Poisson</li>
				<li>Légumes</li>
				<li>Fruits</li>
				<li>Crustacées</li>
				<li>Molusces</li>
			</ul>
		</div>
	</div>
	<div id="bloc_Questions">
		<div id="question_1">
			
		</div>
		<div id="question_2">
			
		</div>
		<div id="question_3">
			
		</div>
		<div id="question_4">
			
		</div>
		<div id="comment_S">
			
		</div>
	</div>
</div>
	

<?php $this->stop('main_content') ?>

<?php $this->start('css') ?>
<style>
.conteneur_L{
	background-image: url("<?=$this->assetUrl('img/vache.jpg')?>");
}
</style>
<?php $this->stop('css') ?>


