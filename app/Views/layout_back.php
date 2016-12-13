<!DOCTYPE html>
<html lang="fr"> 
<head> 
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_back.css') ?>">
</head>
<body>
	
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
					<a href="<?= $this->url('users_add')?>">Ajouter un administrateur</a>
				</li>
				<li class="sidenav-li">
					<a id="disconnect1" href="#">
						Déconnexion
					</a>
					<div class="form-group text-center input-margin" id="disconnect2">
						<!-- Button (Double) -->
						<form method="post">
							<div class="col-md-12">
								<button type="submit" name="disconnect" value="yes" class="btn btn-success">Oui</button>
								<button type="submit" name="disconnect" value="no" class="btn btn-danger">Non</button>
							</div>
						</form>	
					</div>
				</li>
			</ul>
		</nav>
	</header>

	<div id="wrapper" class="container">

		<p class="text-left text-hello">Bonjour, nom utilisateur en dynamique</p>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>	

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= $this->assetUrl('js/scriptback.js') ?>"></script>

</body>
</html>