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
			 <a href="<?= $this->url('questions_questions', ['id' => $selectOneC['id']])?>">
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

	
	
			<p class="text-center name_categorie">Liste des commentaires pour la catégorie&nbsp;:&nbsp;<?=ucfirst(strtolower($selectOneC['title']))?></p>

<div class="scroll_comment">	
			<?php if(empty($selectOneComment)) :?>
		
				<p class="text-center erreur_commentaire">Désolé mais il n'y a aucun commentaire pour cette catégorie. <br> Soyez le permier !</p>	
		
			<?php else : ?>
				<?php foreach ($selectOneComment as $selectOneCom) : ?>
<div class="row">
	<div class="col-lg-12 bloc_comment_user">
		<div class="testiminial-block">
			<div class="row centered">
				<div class="col-lg-12 text-center testimonial-content">
						<div class="testimonial-author">
						<span><?=$selectOneCom['username']?> a écrit :</span>
						</div>
						<br>
						<p><?=$selectOneCom['content']?></p>
				</div>
			</div>
		</div>
	</div>
</div>
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

