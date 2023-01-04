<?php include_once('includes/head.php'); ?>
  <body>
    <div class="container">

<?php include_once('includes/header.php'); ?>
 <main id="site-main">
    <div class="content">
          
          
      <div class="row ">
        <?php if(isset($image)): ?>
        <?php $count = count($image);
        for ($i=0; $i < $count  ; $i++) :?>
         <div class="col">
          <div class="fotorama">
            <?php
             for($j = 0; $j <count($image[$i]); $j++): ?>
            <img src="<?=$image[0][$j]; ?>">
            <?php endfor; ?>
          </div>
          <h3><?=$title[$i];?></h3>
        </div>
        <?php endfor; 
              endif;?>
      </div>
    </div>
    <h4>Hi, <?=$username?></h4>
    <h4>Hi, <?=$password?></h4>
    <h1>Cover your page.</h1>
  </main>
  </div>
</div>
<?php include_once("includes/footer.php"); ?>