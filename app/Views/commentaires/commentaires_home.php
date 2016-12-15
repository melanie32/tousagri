<?php $this->layout('layout', ['title' => 'Commentaires']) ?>

<?php $this->start('css') ?>

<style>
.wrapper_com{
	background-image: url("<?=$this->assetUrl('img/champs.jpg')?>");
}

</style>
<?php $this->stop('css') ?>

<?php $this->start('main_content') ?>

<div class="commentaire">
	<div class="wrapper_com"></div>

	<div class="voir_commentaires">
		<div class="picto_icon"><img src="<?= $this->assetUrl('img/picto/icon.png') ?>"></div>
		<h2 class="title_commentaires">Voir les commentaires de la catégorie $i</h2>
	</div>
	<div class="contenu_commentaires">
		<h3 class="title_nbr_commentaires">$i commentaires</h3>

		<!-- <ul class="commentlist">
			<li class="comment even thread-even depth-1 clearfix dnt_bordercolor_current_ep " id=".....">

				<div class="comment-block" id="....">
					<div class="comment-info">
						<div class="comment-author vcard clearfix">

							<div class="avatar" style="background-color:#d3110a"></div>

							<div class="comment-meta commentmetadata">
								<cite class="fn">TAKAYANAGI</cite>					
								<div style="clear:both;"></div>
								<a class="comment-time">07/06/2015 - 00:33</a>
							</div>
						</div>
							<div class="clearfix"></div>
					</div>

					<div class="comment-text">
						<p>Episode très intéressant merci.</p>
						<p class="reply">
						</p>
					</div>

				</div>
			</li>
		</ul> -->

		<form class="form-horizontal" method="POST">





<!-- username input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Pseudo</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="Pseudo..." class="form-control input-md"> 
  </div>
</div>

<!--content input -->
<div class="form-group">
  <label class="col-md-4 control-label" for="coment">Commentaire</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="coment">Votre commentaire...</textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Envoyer</button>
  </div>
</div>


</form>

 <!---//////////////////// ATTENTION AFFICHAGE COMENTS TEST /////////////////////-->

<?php $this->stop('main_content') ?>
