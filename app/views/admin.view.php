<?php include_once('includes/head.php'); ?>
  <body class="text-center">
    <div class="container">
      <?php include_once('includes/header.php'); ?>
    <div class="content">
     <main class="form-signin">
  <form method="post" enctype="multipart/form-data">

    <?php if(!empty($errors)):?>
      <div class="alert alert-danger">
        <?= implode("<br>", $errors)?>
      </div>
    <?php endif;?>
    <h1 class="h3 mb-3 fw-normal">Add an Album</h1>
    <label for="title">Enter Title</label><br>
     <input class="form-control" type="text" name="title" id="title">
      
    <input type="hidden" name="user_id" value="<?=$id?>">
    <div class="form-floating">
      <label for="image">Enter Image</label><br>
     <input class="custom-file-input" type="file" name="photo[]" id="image" multiple>
    </div>
    <div class="form-floating">
      <label for="select">Status</label><br>
      <select class="form-control" name="status" id="select">
        <option value=""></option>
        <option value="1">Public</option>
        <option value="2">Private</option>
      </select>
    </div>
    <input type="submit" value="Upload">
  </form>
</main>
          

      <div class="row ">
        <?php 
        if(!empty($image[0][0]) ): 

          ?>
              <?php $count = count($image);
              for ($i=0; $i < $count  ; $i++) :?>
               <div class="col">
                <h2><?=$title[$i];?></h2>
                  <?php
                   for($j = 0; $j <count($image[$i]); $j++): ?>
                  <img src="<?=$image[0][$j]; ?>" >
                  <a href="admin?id=<?=$id;?>&delete_image=<?=$imageId[$i];?>&imgi=<?=$i;?>" class="text-danger btn-img">Delete image</a><br>
                  <?php endfor; ?>
                
                  <a href="admin?id=<?=$id;?>&delete_album=<?=$imageId[0];?>" class="text-danger btn btn-danger">Delete Album</a>
                </div>

              <?php endfor; 
            endif;?>
      </div>
            
</div>

    </div>

<?php include_once("includes/footer.php"); ?>