<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" style="color: #FF9C00;"  href="index.php"><h3>FSTBM</h3></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="appartements.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">A propos</a>
          </li>
        </ul>
       <?php if(isset($_SESSION['user']) && isset($_SESSION['password'])): ?>
        <div class="logout d-flex">
          <a href="deconnexion.php"><img src="pics/logout.png" alt="deconnexion" style="width: 60px; height:60px;"></a>
        </div>
        <?php else: ?>
        <div class="d-flex">
          <p class="me-2">
            <a href="login.php" class="button">Login</a>
            <a href="signup.php" class="button">Register</a>
          </p>
        </div>
        <?php endif; ?> 
      </div>
    </div>
</nav>