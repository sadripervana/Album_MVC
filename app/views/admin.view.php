<?php include_once('includes/head.php'); ?>
  <body class="text-center">
    <div class="container">
      <?php include_once('includes/header.php'); ?>
    <div class="content">
     <main class="form-signin">
  <form method="<?=((isset($_GET['edit']))?'GET':'POST');?>" enctype="multipart/form-data">

    <?php if(!empty($errors)):?>
      <div class="alert alert-danger">
        <?= implode("<br>", $errors)?>
      </div>
    <?php endif;?>
    <h2 class="h3 mb-3 fw-normal">
      <?=((isset($_GET['edit']))?'Edit':'Add a New');?> Album</h2>
    <label for="title">Enter Title</label><br>
     <input class="form-control" type="text" name="title" id="title" value="<?=$titleEdit;?>">
      
    <input type="hidden" name="user_id" value="<?=$id?>">
    <div class="form-floating">
      <?php if(!isset($_GET['edit'])): ?>
      <label for="image">Enter Image</label><br>
     <input class="custom-file-input" type="file" name="photo[]" id="image" multiple>
   <?php endif;?>
    </div>
    <div class="form-floating">
      <input type="hidden" name="id" value="<?=((isset($_GET['edit']))? $_GET['edit']:'');?>">
      <label for="select">Status</label><br>
      <select class="form-control" name="status" id="select" >
        <option value=""></option>
        <option value="1">Public</option>
        <option value="2">Private</option>
      </select>
    </div>
    <input type="submit" value="<?=((isset($_GET['edit']))?'Edit':'Upload');?>">
    <?php if(isset($_GET['edit'])): ?>
      <a href="admin" class="button-cancel">Cancel</a>
    <?php endif; ?>
  </form>
</main>
          

      <div class="rowAdmin ">
        <?php 
        if(!empty($image[0][0]) ): 

          ?>
              <?php $count = count($image);
              for ($i=0; $i < $count  ; $i++) :?>
               <div class="col">
                <h2><?=$title[$i];?></h2>
                <a href="admin?edit=<?=$imageId[$i]?>" class="button">Edit</a><br>
                  <a href="admin?delete_album=<?=$imageId[$i];?>" class="text-danger btn btn-danger">Delete Album</a>
                  <?php
                   for($j = 0; $j <count($image[$i]); $j++): ?>
                  <img src="<?=$image[$i][$j]; ?>" >
                  <?php 
                  $count_second = count($image[$i]);
                  if( $count_second != 1): ?>
                  <a href="admin?delete_image=<?=$imageId[$i];?>&imgi=<?=$j;?>" class="text-danger btn-img">Delete image</a><br>
                <?php endif ;?>
                  <?php endfor; ?>
                
                </div>

              <?php endfor; 
            endif;?>
      </div>
            
</div>

    </div>

<?php include_once("includes/footer.php"); ?>