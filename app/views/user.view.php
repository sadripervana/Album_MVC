<?php include_once('includes/head.php'); ?>
  <body>
    <div class="container">

<?php include_once('includes/header.php'); ?>
 <main id="site-main">
    <div class="content">
          
          
      <div class="row ">
        <?php if(empty($image)): ?>
          <p>This user doesn't have images yet</p>
        <?php endif;?>
        <?php if(isset($image)): ?>
        <?php $count = count($image);
        for ($i=0; $i < $count  ; $i++) :?>
         <div class="col">
          <div class="fotorama"
     data-nav="thumbs"
     data-thumbmargin="10"
     data-width="800"
     data-height="600">
            <?php
             for($j = 0; $j <count($image[$i]); $j++): ?>
            <img src="<?=$image[$i][$j]; ?>">
            <?php endfor; ?>
          </div>
          <h1><?=$title[$i];?></h1>
          <a href="users?id=<?=$_GET['id'];?>&likes=<?=$imageId[$i]?>">
            <i id="id" 
            class="<?php
             if($likes[$i] == 0)
            {
              echo 'fa-regular ';
            }
              else {
               echo 'fa-solid ';
              }
                ?> 
            fa-thumbs-up"> Like <?=$likes[$i];?></i></a> &nbsp &nbsp
          <a href="users?id=<?=$_GET['id'];?>&dislikes=<?=$imageId[$i]?>"><i class="
            <?php if($dislikes[$i] == 0)
            {
              echo 'fa-regular ';
            }
              else {
               echo 'fa-solid ';
              }
                ?> 
           fa-thumbs-down"> Dislike <?=$dislikes[$i];?></i></a>
        </div>
        <?php endfor; 
              endif;?>
      </div>
    </div>
  </main>
</div>
<?php include_once("includes/footer.php"); ?>