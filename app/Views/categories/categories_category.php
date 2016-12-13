<?php $this->layout('layout', ['title' => '']) ?>


<?php $this->start('main_content') ?>


<body class="categories">
    <div class="container contai">

    <div class="siteNam">
    <h1  class="text-center namSite">Vous les agriculteurs, vous êtes tous les mêmes!</h1>
    </div>

        <div class="row dad">
          <div class="col-xs-6 col-md-4 imBox"><img id="secPic" src="<?= $this->assetUrl('img/picto/poisson.png') ?>"></div>
          <div class="col-xs-6 col-md-4 imBox"><img id="secPic" src="<?= $this->assetUrl('img/picto/poisson.png') ?>"></div>
          <div class="col-xs-6 col-md-4 imBox"><img id="secPic" src="<?= $this->assetUrl('img/picto/poisson.png') ?>"></div>
        </div>

          <!-- Add the extra clearfix for only the required viewport -->

        <div class="row dad">
          <div class="col-xs-6 col-md-4 imBox"><img id="secPic" src="<?= $this->assetUrl('img/picto/poisson.png') ?>"></div>
          <div class="col-xs-6 col-md-4 imBox"><img id="secPic" src="<?= $this->assetUrl('img/picto/poisson.png') ?>"></div>
          <div class="col-xs-6 col-md-4 imBox"><img id="secPic" src="<?= $this->assetUrl('img/picto/poisson.png') ?>"></div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bottNav">

    
            <div>
                <div class="col-md-12 col-md-offset-6">
                    <ul class="navList">
                        <a href="#">A propos</a>
                        <a href="#">Partenaires</a>
                        <a href="#">Partager</a>
                        <a href="#">Crédits</a>
                        <a href="#">Mentions Légales</a>
                    </ul>
                </div>
            </div>
    

    </footer>
</body>

<?php $this->stop('main_content') ?>