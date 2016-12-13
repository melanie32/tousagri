
<?php $this->layout('layout', ['title' => '']) ?>


<?php $this->start('main_content') ?>

<div id="reset">
<!-- Titre -->
	<div class="col-md-12 headLine">
		<h1 id="text"  class="hLine">Vous les agriculteurs, vous êtes tous les mêmes!</h1>
	</div>

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
<?php $this->stop('main_content') ?>
