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

          <div class="rowAdmin ">
        <?php if(!empty($image[0][0]) ):?>
            <?php $count = count($image);
              for ($i=0; $i < $count  ; $i++) :?>
               <div class="col">
                <h2><?=$title[$i];?></h2>
                <a href="admin?edit=<?=$imageId[$i]?>" class="button">Edit</a>
                <a href="album?view=<?=$id;?>&delete_album=<?=$imageId[$i];?>" class="text-danger btn btn-danger">Delete Album</a>
                <div class="rowPhoto">
                  
                
                
                <?php for($j = 0; $j <count($image[$i]); $j++):?>
                  <div class="colimage">
                    <img src="<?=$image[$i][$j]; ?>" >
                  <?php $count_second = count($image[$i]);
                    if( $count_second != 1): ?>
                    <a href="album?view=<?=$id;?>&delete_image=<?=$imageId[$i];?>&imgi=<?=$j;?>" class="text-danger btn-img">Delete image</a><br>
                    <?php endif ;?>
                  </div>
                  
                <?php endfor; ?>
                </div>
                </div>
            <?php endfor; 
            endif;?>
      </div>
        </div>
        <?php endfor; 
              endif;?>
      </div>
    </div>
  </main>
  </div>
</div>
<?php include_once("includes/footer.php"); ?>