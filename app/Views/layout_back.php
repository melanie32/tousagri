<!DOCTYPE html>
<html lang="fr">
<head> 
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_back.css') ?>">
</head>
<body>
	
	<header>			
		<nav class="sidenav">
			<ul>
				<li><a href="#">Retour liste des catégories</a></li>
				<li><a href="#">Editer les catégories active</a></li>
				<li><a href="#">Editer les commentaires</a></li>
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

</body>
</html>