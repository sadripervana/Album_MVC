<?php include_once('includes/head.php'); ?>
  <body>
    <div class="container">

<?php include_once('includes/header.php'); ?>
 <main id="site-main">
    <div class="content">
      <div class="User">
          
      <div class="a-box">
        <a href="/users?id=<?=$user_id;?>">
        <div class="img-container">
          <div class="img-inner">
            <div class="inner-skew">
              <img src="<?=$user_image?>">
            </div>
          </div>
      </div>
    <div class="text-container">
      <h3><?=$first_name;?> <?=$last_name;?></h3>
      <div>
        Joined:<?=$date;?>
      </div>
    </div>
  </a>
  </div>
    </div>


<div class="grid">
    <?php if(empty($image)): ?>
          <p>This user doesn't have images yet</p>
        <?php endif;?>
        <?php if(isset($image)): ?>
        <?php $count = count($image);
        for ($i=0; $i < $count  ; $i++) :?>

    
      <div class="grid__item">
        <div class="card">
          <div class="card__img">
             <img src="<?=$image[$i][0]; ?>">
          </div>
          <div class="card__content">
            <div class="card__header">
              <h1><?=$title[$i];?></h1>
            </div>
            <div class="card__text">
              <?=$description[$i];?>
            </div>
            <a href="album?views=<?=$imageId[$i];?>">
            <div class="card__btn">
              Explore <span>&rarr;</span>
            </div>
            </a>
          </div>
        </div>
      </div>
    
    <?php endfor; 
          endif;?>
     </div>
      
    </div>
  </main>
</div>
<?php include_once("includes/footer.php"); ?>