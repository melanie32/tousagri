<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>


	<!-- appel à la bibliothèque / librairy css de boostrap (différente du script bootsrap) -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- appel à nos feuilles de styles css pour le front -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_front.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_frontQuestion.css') ?>">

	<!-- appel des polices -->
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Quicksand" rel="stylesheet"> 

	<!-- permet de faire appel à une fonctionnalité CSS notamment pour les background img (utile pour instertion via le back après) -->
	<?=$this->section('css');?>	

</head>
<body class="background-c">

		<section>
			<?= $this->section('main_content') ?>
		</section>


		<!-- Footer -->
		<footer class="bottNav col-md-12">			
			<a href="<?=$this->url('propos_propos')?>">A Propos</a>
			<a href="<?=$this->url('mentions_mentions')?>">Mentions Légales</a>			
		</footer>




<!-- appel aux librairies/ bibliothèques jquery et bootsrap pour les scripts -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- appel de nos propres script.js pour le front -->

<script type="text/javascript" src="<?= $this->assetUrl('js/scriptQuestion.js') ?>"></script>

<script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>"></script>

<?= $this->section('script') ?>
</body>
</html>