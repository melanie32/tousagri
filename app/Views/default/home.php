
<?php $this->layout('layout', ['title' => 'Tous Agri']) ?>


<?php $this->start('css') ?>
<style>
.background-c{
    background: url("<?=$this->assetUrl('img/illustrations/fdHome.jpg')?>");
    background-position: center;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
</style>
<?php $this->stop('css') ?>

<?php $this->start('main_content') ?>
<div id="reset" class="home">
<!-- Titre -->
	<div class="headLine">
		<h1 id="text"  class="hLine"><b>Vous les agriculteurs, vous êtes tous les mêmes!</b></h1>
	<!-- </div> -->

<!-- Boutton -->
			<div class="container">
				<div class="row">
					<div class="col-md-12 startBut">
						<a href="<?= $this->url('categories_category') ?>">
							<input id="tata" type="button" class="btn style-reset start" value="Commencer">	
						</a>			
					</div>
				</div>
			</div>
	</div>
</div>

<?php $this->stop('main_content') ?>
