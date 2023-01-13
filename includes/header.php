
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title><?php echo $pageTitle ; ?></title>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-4">
                <figure>
    <img class="mx-auto" src="./img/logo.png" alt="" srcset="">
</figure>

                </div>
                <div class="col-8 d-flex align-items-center">
                    <h1>Faculté des Sciences et Techniques</h1>
                </div>
            </div>
        </div>
    </header>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container">
  <a class="nav-link dropdown-toggle " style="color:white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
              if (isset($_SESSION["user"])) {
                echo $_SESSION["user"]["nom"];
                echo " ";
                echo $_SESSION["user"]["prenom"];
              }
              else{
                echo"S'authentifier";
              }
            ?>
          </a>
          <ul class="dropdown-menu">
            <?php
              if (isset($_SESSION["user"])) {
                echo '
            <li><a class="dropdown-item" href="accueil">mon espace</a></li>
            <li><a class="dropdown-item" href="logout.php">deconnecter</a></li>
            ';}
            else {
              echo '

            <li><a class="dropdown-item" href="login.php">login</a></li>
            <li><a class="dropdown-item" href="signup.php">signup</a></li>
              ';
            }
            ?>
          </ul>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="">Home</a>
        <a class="nav-link" href="accueil.php">mon espace</a>
        <a class="nav-link" href="#">about</a>
      </div>
    </div>
  </div>
</nav>