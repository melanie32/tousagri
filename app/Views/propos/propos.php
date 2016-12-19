<?php $this->layout('layout', ['title' => 'A propos']) ?>

<?php $this->start('main_content') ?>

<div id="wrapper_Mentions">

		<div class="title_conteneur_L">
			<h1>- Mention Légale -</h1>
		</div>

	<div class="bloc_nav_opacity"></div> 
</div>


<?php $this->stop('main_content') ?>

<?php $this->start('css') ?>
<style>
	.title_conteneur_L{
		background-image: url("<?=$this->assetUrl('img/mentions.jpg')?>");
	}

</style>
<?php $this->stop('css') ?>