<?php $this->layout('layout_back', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

	<p class="text-left text-hello">Bonjour, <?=$selectU[0]['username']?></p>	

	<div class="container-edit-admin">

		<a href="<?= $this->url('admin_categories')?>">
			<div class="edit-admin text-center">
				Editer les catégories
			</div>
		</a>

		<a href="<?= $this->url('admin_edit_comments')?>">
			<div class="edit-admin text-center">
				Editer les commentaires
			</div>
		</a>

	</div>

	

	
<?php $this->stop('main_content') ?>