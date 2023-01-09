<?php include_once('includes/head.php'); ?>
  <body>
  <div class="container">

  <?php include_once('includes/header.php'); ?>
   <main id="site-main">
      <div class="content">
          <div class="colHome">
          <?php $count = count($first_name);
          for ($i=0; $i < $count  ; $i++) :?>
      <div class="a-box">
        <a href="/users?id=<?=$user_id[$i];?>">
        <div class="img-container">
          <div class="img-inner">
            <div class="inner-skew">
              <img src="<?=$user_image[$i]?>">
            </div>
          </div>
      </div>
    <div class="text-container">
      <h3><?=$first_name[$i];?> <?=$last_name[$i];?></h3>
      <div>
        Joined:<?=$date[$i];?>
      </div>
    </div>
  </a>
  </div>
    <?php endfor; ?>
    
  </main>
</div>
  <?php include_once("includes/footer.php"); ?>