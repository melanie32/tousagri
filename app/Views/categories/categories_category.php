<?php $this->layout('layout', ['title' => '']) ?>

<?php $this->start('css') ?><!-- abcd -->
<style>
body{
    background: url("<?=$this->assetUrl('img/illustrations/fdCate3.jpg')?>");
    background-position: center;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}

</style>
<?php $this->stop('css') ?>
<?php $this->start('main_content') ?>



<div class="container contai">

    <div class="siteNam">
      <h1  class="text-center namSite">Vous les agriculteurs, vous êtes tous les mêmes!</h1>
    </div>

  <div class="wrappy">
    <div class="row dad">

    <?php foreach ($selectC as $select) : ?>
      <div class="col-xs-6 col-md-4 imBox">
        <a href="<?= $this->url('questions_questions', ['id' => $select['id']]); ?>">
         <p class="text-center secNam"><?=$select['title']?></p>
          <img id="secPic" src="<?= $this->assetUrl('img/pictos/'.$select['pictogram'])?>" >
        </a>
      </div>
      <?php endforeach; ?>

      </div>
  </div>



  </div>




<?php $this->stop('main_content') ?>