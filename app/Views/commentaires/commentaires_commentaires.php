<?php $this->layout('layout', ['title' => 'Commentaires']) ?>

<?php $this->start('css') ?>

<style>
.wrapper_commentaires { 
    background: url("<?=$this->assetUrl('img/picture_5857a2f0ca0e6.jpg')?>") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    position: absolute;
    height: 100%;
	width: 100%;
}


</style>

<div class="wrapper_commentaires">

		<div class="col-md-1 back retour">
			 <a href="<?= $this->url('categories_category') ?>">
			 <input id="toto" type="button" class="btn style-reset start" value="Retour"> 
			 </a>
		</div>

<div class="contenu_commentaire">
	<div class="bloc_ok_commentaire">
		<?php $this->stop('css') ?>

		<?php $this->start('main_content') ?>

			<?php if(isset($errors) && !empty($errors)):?> 
				<div class="alert alert-danger">
					<?=implode('<br>', $errors); ?>
				</div>
			<?php endif; ?>

			<?php if(isset($success) && $success == true):?>
				<div class="alert alert-success">
					Votre commentaire a bien été enregistré et sera publié dès modération !
				</div>
			<?php endif; ?>
	</div>

	
	<div class="list_commentaires">
			<p class="text-center name_categorie">Liste des commentaires pour la catégorie&nbsp;:&nbsp;<?=$selectOneC['title']?></p>
<pre>
<?php var_dump($selectOneComment);?>
</pre>
			<?php if(empty($selectOneCommment)) :?>

				<p class="text-center erreur_commentaire">Désolé mais il n'y a aucun commentaire pour cette catégorie. <br> Soyez le permier !</p>
			<?php else : ?>
				<?php foreach ($selectOneComment as $selectOneCom) : ?>
					<p><?=$selectOneCom['username']?>&nbsp;:&nbsp;a écrit : </p>	
				
					<p><?=$selectOneCom['content']?></p>
				
				<?php endforeach;?>
			<?php endif;?>
		
	</div>
	<div class="ajouter_commentaire">
		<form class="form-horizontal" method="post">
			<input type="hidden" name="id-category" value="<?=$selectOneC['id']?>">

			<div class="form-group">
			  <label id="label_commentaire" class="col-md-4 control-label" for="username">Pseudo</label>  
			  <div class="col-md-4">
			  <input id="username" name="username" type="text" placeholder="Pseudo..." class="form-control input-md"> 
			  </div>
			</div>

			<div class="form-group">
			  <label id="label_commentaire" class="col-md-4 control-label" for="content">Commentaire</label>
			  <div class="col-md-4">                     
			    <textarea class="form-control" id="textarea" name="content" placeholder="Votre commentaire"></textarea>
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="submit"></label>
			  <div class="col-md-4 text-center">
			    <button id="submit" name="submit" class="btn btn-primary persoB">Envoyer</button>
			  </div>
			</div>
		</form>
	</div>

		
</div>
		
</div>


 <!---//////////////////// ATTENTION AFFICHAGE COMENTS TEST /////////////////////-->


<?php $this->stop('main_content') ?>

