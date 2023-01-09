<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Sign up</title>


    <!-- Bootstrap core CSS -->
<link href="<?=ROOT?>/assets/css/bootstrap.min.css" rel="stylesheet">

 <!-- Custom styles for this template -->
    <link href="<?=ROOT?>/assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post" enctype="multipart/form-data">

    <?php if(!empty($errors)):?>
      <div class="alert alert-danger">
        <?= implode("<br>", $errors)?>
      </div>
    <?php endif;?>
  
    <h1 class="h3 mb-3 fw-normal">Create account</h1>

    <div class="form-floating">
      <input name="first_name" type="text" class="form-control" id="first" >
      <label for="first">First Name</label>
    </div>
    <div class="form-floating">
      <input name="last_name" type="text" class="form-control" id="last">
      <label for="last">Last Name</label>
    </div>
    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
     
        <label for="file">Enter Image</label>
        <input type="hidden" name="user_id" value="<?=$id?>">
        <input type="file" id="file" name="photo[]" multiple><br>
      
    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Create</button>
    <a href="<?=ROOT?>">Home</a>
    <a href="<?=ROOT?>/login">Login</a>
  </form>
</main>


    
  </body>
</html>
