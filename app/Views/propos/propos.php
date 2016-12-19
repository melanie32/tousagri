<?php $this->layout('layout', ['title' => 'A propos']) ?>

<?php $this->start('main_content') ?>

<div id="wrapper_Mentions">
		<div class="col-md-1 back retour">
			 <a href="<?= $this->url('categories_category') ?>">
			 <input id="toto" type="button" class="btn style-reset start" value="Retour"> 
			 </a>
		</div>


		<div class="title_conteneur_L">
			<h1>- A Propos -</h1>
		</div>

	<div class="bloc_nav_opacity"></div> 
</div>
<div id="bloc_mentions_apropos">
<h2>Tout commence au 66 Rue de l'abbée de l'épée...</h2>
	<p>Peregrini remanerent id adseclae saltatricum disciplinarum milia quidem alimentorum veri cum dudum pellerentur sine est haut totidemque id peregrini ut magistris quidem milia paucis peregrini paucis extrusis tempus totidemque ita ad tria disciplinarum id liberalium praecipites interpellata saltatricum formidatam choris milia ob magistris urbe sectatoribus ventum quidem extrusis ut milia id indignitatis quidem urbe tria liberalium milia tenerentur disciplinarum tempus ad cum quidem cum totidemque saltatricum liberalium praecipites urbe simularunt respiratione cum haut paucis sectatoribus tenerentur quique ut cum choris minimarum id liberalium id ne ob adseclae cum tria minimarum inpendio haut praecipites alimentorum dudum pellerentur choris ab milia sectatoribus.<br>
	Peregrini remanerent id adseclae saltatricum disciplinarum milia quidem alimentorum veri cum dudum pellerentur sine est haut totidemque id peregrini ut magistris quidem milia paucis peregrini paucis extrusis tempus totidemque ita ad tria disciplinarum id liberalium praecipites interpellata saltatricum formidatam choris milia ob magistris urbe sectatoribus ventum quidem extrusis ut milia id indignitatis quidem urbe tria liberalium milia tenerentur disciplinarum tempus ad cum quidem cum totidemque saltatricum liberalium praecipites urbe simularunt respiratione cum haut paucis sectatoribus tenerentur quique ut cum choris minimarum id liberalium id ne ob adseclae cum tria minimarum inpendio haut praecipites alimentorum dudum pellerentur choris ab milia sectatoribus.</p>

	 <!-- Team Members Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">La Team Site Adulte</h2>
            </div>
            <div class="col-lg-4 col-sm-6 text-center" id="padding_center">
                <img id="img_perso" class="img-circle img-responsive img-center" src="<?= $this->assetUrl('img/createur/omar-sy.jpg')?>" alt="">
                <h3>Anthony DOUX
                    <small>Job Title</small>
                </h3>
                <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center" id="padding_center">
                <img id="img_perso" class="img-circle img-responsive img-center" src="<?= $this->assetUrl('img/createur/omar-sy.jpg')?>" alt="">
                <h3>Mélanie DUPUY
                    <small>Job Title</small>
                </h3>
                <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center" id="padding_center">
                <img id="img_perso" class="img-circle img-responsive img-center" src="<?= $this->assetUrl('img/createur/omar-sy.jpg')?>" alt="">
                <h3>Yann MORA
                    <small>Job Title</small>
                </h3>
                <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
            </div>
            <div class="col-lg-12">
                <h2 class="page-header">La Team Site Enfant</h2>
            </div>
            <div class="col-lg-4 col-sm-6 text-center" id="padding_center">
                <img id="img_perso" class="img-circle img-responsive img-center" src="<?= $this->assetUrl('img/createur/omar-sy.jpg')?>" alt="">
                <h3>Anthony BAS
                    <small>Job Title</small>
                </h3>
                <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center" id="padding_center">
                <img id="img_perso" class="img-circle img-responsive img-center" src="<?= $this->assetUrl('img/createur/omar-sy.jpg')?>" alt="">
                <h3>Carinne GRANET
                    <small>Job Title</small>
                </h3>
                <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center" id="padding_center">
                <img id="img_perso" class="img-circle img-responsive img-center" src="<?= $this->assetUrl('img/createur/omar-sy.jpg')?>" alt="">
                <h3>Renaud ROUSSELLE
                    <small>Job Title</small>
                </h3>
                <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
            </div>
            <div class="col-lg-12 center">
               	<div class="col-lg-4 col-sm-6 col-lg-offset-4 text-center" id="padding_center">
               		<img id="img_perso" class="img-circle img-responsive img-center" src="<?= $this->assetUrl('img/createur/omar-sy.jpg')?>" alt="">
                	<h3>Mamour
                    	<small>Job Title</small>
                	</h3>
                <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
            	</div>
            </div>
        </div>
</div>


<?php $this->stop('main_content') ?>

<?php $this->start('css') ?>
<style>
	.title_conteneur_L{
		background-image: url("<?=$this->assetUrl('img/equipe.jpg')?>");
	}

</style>
<?php $this->stop('css') ?>