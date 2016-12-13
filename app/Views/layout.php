<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_front.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_frontQuestion.css') ?>">


<?=$this->section('css');?>	

</head>
<body>
		<section>
			<?= $this->section('main_content') ?>
		</section>

<<<<<<< HEAD:app/Views/layout_front.php
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= $this->assetUrl('js/scriptQuestion.js') ?>"></script>

=======
		<footer>
		</footer>
	</div>


	<script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>"></script>
>>>>>>> origin/master:app/Views/layout.php
</body>
</html>