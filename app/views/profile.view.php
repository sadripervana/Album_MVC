<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>


    <!-- Bootstrap core CSS -->
<link href="<?=ROOT?>/assets/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="<?=ROOT?>/assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post">

    <?php if(!empty($errors)):?>
      <div class="alert alert-danger">
        <?= implode("<br>", $errors)?>
      </div>
    <?php endif;?>
  
    <h1 class="h3 mb-3 fw-normal">Edit account</h1>

    <div class="form-floating">
      <input name="first_name" type="text" class="form-control" id="first" value="<?=$first_name;?>" >
      <label for="first">First Name</label>
    </div>
    <div class="form-floating">
      <input name="last_name" type="text" class="form-control" id="last" value="<?=$last_name;?>">
      <label for="last">Last Name</label>
    </div>
    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?=$email;?>">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Edit Profile</button>
    <a href="<?=ROOT?>">Home</a>
    <a href="<?=ROOT?>/admin">Admin</a>
    <a href="<?=ROOT?>/profile?del=<?=$id;?>">Delete Account</a>
  </form>
</main>
  </body>
</html>
