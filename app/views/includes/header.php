    <header id="header" class="mb-auto">

      <nav class="container navbar">

        <a href="<?=ROOT?>" class="nav-brand text-dark">
        Albume
      </a>
    <!-- toggle button -->
    <button class="toggle-button">

      <span><i class="fas fa-bars"></i></span>
    </button>

    <!-- collapse on toggle button click -->
    <div class="collapse">
      <ul class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="<?=ROOT?>">Home</a>
        <?php if(isset($_SESSION['USER'])): ?>
        <a class="nav-link" href="<?=ROOT?>/admin">Admin</a>
        <a class="nav-link" href="<?=ROOT?>/profile">Edit Profile</a>
        <a class="nav-link" href="<?=ROOT?>/logout">Welcome <?=$_SESSION['USER']->first_name;?> (logout)</a>
      <?php endif; ?>
        <?php if(!isset($_SESSION['USER'])): ?>
        <a class="nav-link" href="<?=ROOT?>/login">Login</a>
       <a class="nav-link" href="<?=ROOT?>/signup">Signup</a>
      <?php endif; ?>
      </ul>
    </div>
      </nav>
  </header>