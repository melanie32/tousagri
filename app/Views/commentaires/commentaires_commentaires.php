<?php $this->layout('layout', ['title' => 'Commentaires']) ?>

<?php $this->start('css') ?>

<style>
.full {
    background: url("<?=$this->assetUrl('img/balo.jpg')?>") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
}


</style>
<?php $this->stop('css') ?>

<?php $this->start('main_content') ?>

<div class="commentaire">

	<!-- <div class="voir_commentaires">
		<h2 class="title_commentaires">Voir les commentaires de la catégorie $i</h2>
	</div> -->
	<div class="contenu_commentaire">
	
	</div>

		

		<form class="form-horizontal" method="POST">

			<div class="form-group">
			  <label class="col-md-4 control-label" for="username">Pseudo</label>  
			  <div class="col-md-4">
			  <input id="username" name="username" type="text" placeholder="Pseudo..." class="form-control input-md"> 
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="coment">Commentaire</label>
			  <div class="col-md-4">                     
			    <textarea class="form-control" id="textarea" name="coment">Votre commentaire...</textarea>
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="submit"></label>
			  <div class="col-md-4">
			    <button id="submit" name="submit" class="btn btn-primary">Envoyer</button>
			  </div>
			</div>
		</form>
</div>


 <!---//////////////////// ATTENTION AFFICHAGE COMENTS TEST /////////////////////-->

<?php $this->stop('main_content') ?>

