<?php $this->layout('layout_back', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>


	<div class="text-center">
		<p class="text-connect">
			<i class="fa fa-2x fa-home" aria-hidden="true"></i>
			&nbsp;ACCUEIL
		</p>
	</div>

		<p class="text-left text-hello">Bonjour, <b><?=$w_user['username']?></b></p>	
	
	<div class="container-edit-admin">

		<a href="<?= $this->url('admin_categories')?>">
			<div class="edit-admin text-center">
				CATEGORIES
			</div>
		</a>

		<a href="<?= $this->url('admin_edit_comments')?>">
			<div class="edit-admin text-center">
				COMMENTAIRES
			</div>
		</a>

	</div>

	

	
<?php $this->stop('main_content') ?>