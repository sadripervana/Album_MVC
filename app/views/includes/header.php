    <header id="header" class="mb-auto">

      <nav class="container navbar">

        <a href="index.php" class="nav-brand text-dark">
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
        <a class="nav-link" href="<?=ROOT?>/admin?id=<?=$id?>">Admin</a>
      <?php endif; ?>
        <a class="nav-link" href="<?=ROOT?>/login">Login</a>
        <a class="nav-link" href="<?=ROOT?>/logout">Logout</a>
      </ul>
    </div>
      </nav>
  </header>