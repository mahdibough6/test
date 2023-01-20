
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
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

<nav id="nav">
  <div id="listBtns">
<ul>
  <li><a href="index.php">Accueil</a> </li>
       <?php if(isset($_SESSION['user'])): ?>
  <li> <a href="accueil.php">mon-espace</a> </li>
        <?php else: ?>

  <li> <a href="#">contactez-nous</a> </li>
        <?php endif; ?> 
  <li> <a href="about.php">A propos</a> </li>
</ul>
  </div>
<div id="authBtns">
       <?php if(isset($_SESSION['user'])): ?>
<a href="logout.php" class="btn btn-outline-danger">deconnexion</a>
        <?php else: ?>
          <a href="login.php" class="btn btn-outline-primary">se connecter</a>
          <a href="signup.php" class="btn btn-outline-info">s'inscrire</a>
        <?php endif; ?> 
</div>
</nav>