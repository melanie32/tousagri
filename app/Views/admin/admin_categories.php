<?php $this->layout('layout_back', ['title' => 'Liste des catégories']) ?>

<?php $this->start('main_content') ?>  

	<div class="text-center">
		<p class="text-connect">
			<i class="fa fa-list" aria-hidden="true"></i>
			&nbsp;LISTE DES CATEGORIES
		</p>
	</div>
	<br>
	

	<!-- <a class="text-add-categ text-center" id="add-category" href="<= $this->url('admin_add_categories')?>">
		<button class="btn-lg">Ajouter une catégorie</button>	
	</a>
 -->

	<a href="<?= $this->url('admin_add_categories')?>" class="text-add-categ text-center btn btn-default input-styl-border" id="add-category">
		<span class="glyphicon glyphicon-new-window"></span> Ajouter une catégorie
	</a>
	<br>
	

	<div class="container containerCat">
		<?php foreach ($selectC as $select) : ?>
		<div class="row contain-cub-category col-md-4">		

			

			<div class="cub-category">
				<p class="text-center name-category"><?=$select['title']?></p>
				<img class="picto_category center-block" src="<?= $this->assetUrl('img/pictos/'.$select['pictogram'])?>">
				<div class="contain-link-category">
					<a class="text-center link-category" href="<?=$this->url('admin_edit_categories', ['id' => $select['id']]);?>">MODIFIER</a>
					<a class="text-center link-category" href="<?=$this->url('admin_delete_categorie', ['id' => $select['id']]);?>">SUPPRIMER</a>
				</div>
			</div>
			
		</div>
		<?php endforeach; ?>	
	</div>
		



	

	
<?php $this->stop('main_content') ?>