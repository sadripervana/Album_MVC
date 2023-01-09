<?php include_once('includes/head.php'); ?>
  <body class="text-center">
    <div class="container">
      <?php include_once('includes/header.php'); ?>
    <div class="content">
     <main class="form-signin">
      <form method="POST" enctype="multipart/form-data">

    <?php if(!empty($errors)):?>
      <div class="alert alert-danger">
        <?= implode("<br>", $errors)?>
      </div>
    <?php endif;?>
    <h1 class="h3 mb-3 fw-normal">
      <?=((isset($_GET['edit']))?'Edit':'Add a New');?> Album</h1>
    <label for="title">Enter Title</label><br>
     <input class="form-control" type="text" name="title" id="title" value="<?=$titleEdit;?>">
     <br>
    <label for="description">Enter Description</label><br>
    <textarea class="form-control" name="description" id="description" cols="71" rows="6"><?=$descriptionEdit;?></textarea>
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
    <button type="submit" name="<?=((isset($_GET['edit']))?'editButton':'firstButton');?>"><?=((isset($_GET['edit']))?'Edit':'Upload');?></button>
    <?php if(isset($_GET['edit'])): ?>
      <a href="admin" class="button-cancel">Cancel</a>
    <?php endif; ?>
  </form>

  <?php if(!isset($_GET['edit'])): ?>
  <form action="" method="post" enctype="multipart/form-data">
    <h2>Upload Only image</h2><br>
    <label for="file">Enter Image</label><br>
    <input type="hidden" name="user_id" value="<?=$id?>">
    <input type="file" id="file" name="photo[]" multiple><br>
    <button type="submit" name="secondButton">Upload</button>
  </form>
  <?php endif; ?>
</main>
          

      <div class="rowAdmin ">
        <?php if(!empty($image[0][0]) ):?>
            <?php $count = count($image);
              for ($i=0; $i < $count  ; $i++) :?>
               <div class="col">
                <h2><?=$title[$i];?></h2>
                <a href="admin?edit=<?=$imageId[$i]?>" class="button">Edit</a>
                <a href="album?view=<?=$imageId[$i]?>" class="button">View</a><br>
                  <img src="<?=$image[$i][0]; ?>" >
                  <?php $count_second = count($image[$i]);?>
                </div>
            <?php endfor; 
            endif;?>
      </div>
</div>

    </div>

<?php include_once("includes/footer.php"); ?>