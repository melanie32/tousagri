<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('css') ?><!-- abcd -->
<style>
.background-c{
    background: url("<?=$this->assetUrl('img/illustrations/fdCate3.jpg')?>");       
    background-repeat: no-repeat;
    background-size: cover;
    padding-bottom: 1.5em;
}

</style>
<?php $this->stop('css') ?>

<div id="wrapper-accueil">

  <?php $this->start('main_content') ?>
  <div class="siteNam">
    <h1  class="text-center namSite">Vous les agriculteurs, vous êtes tous les mêmes!</h1>
  </div>

  <div class="container containerTab">

    <?php foreach ($selectC as $select) : ?>
      <div class="row dad col-lg-4 col-md-3 col-xs-6">

          <a class="imBox" href="<?= $this->url('questions_questions', ['id' => $select['id']]); ?>">
            <div>
              <p class="text-center secNam"><?=$select['title']?></p>
              <img class="img-responsive" id="secPic" src="<?= $this->assetUrl('img/pictos/'.$select['pictogram'])?>" >
            </div>
          </a>

    </div>
    <?php endforeach; ?>
  </div>
  <?php $this->stop('main_content') ?>
</div>


