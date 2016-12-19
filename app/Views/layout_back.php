<!DOCTYPE html> 
<html lang="fr">  
<head> 
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_back.css') ?>">

	<style>
		.background{
		    background: url('<?=$this->assetUrl('img/bkg1.jpg')?>');
		    /*background-position: cover;*/
		    background-position: center;
    		background-size: 100% 100%;
    		background-repeat: no-repeat;	    
		}

	</style>



</head>
<body>
	<div class="background">
<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])) : ?>
	<header>			
		<nav class="sidenav">
			<ul class="sidenav-ul">
				<li class="sidenav-li <?= ($w_current_route == 'admin_accueil')? 'active' :''; ?>">
					<a href="<?= $this->url('admin_accueil')?>">
						<i class="fa fa-3x fa-home" aria-hidden="true"></i>
					</a>
				</li>
				<li class="sidenav-li <?= ($w_current_route == 'admin_categories')? 'active' :''; ?>">
					<a href="<?= $this->url('admin_categories')?>">Listes des catégories</a>
				</li>
				<li class="sidenav-li <?= ($w_current_route == 'admin_edit_comments')? 'active' :''; ?>">
					<a href="<?= $this->url('admin_edit_comments')?>">Listes des commentaires</a>
				</li>
				<li class="sidenav-li <?= ($w_current_route == 'users_add')? 'active' :''; ?>">
					<a href="<?= $this->url('admin_users_add')?>">Ajouter un administrateur</a>
				</li>
				<li class="sidenav-li">
					<a href="<?= $this->url('admin_logout')?>">
					Deconnexion</a>
				</li>
			</ul>
		</nav>
	</header>
<?php endif; ?>

	<div id="wrapper" class="container">

		
		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>	

</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= $this->assetUrl('js/scriptback.js') ?>">
	
</script>
<?= $this->section('script') ?>
</body>
</html>