<?php 
session_start();
// if the user is not connected redirect to the home page (using the router folder)


$pageTitle = "index";
 include './includes/header.php';
  ?>
   

<section style="background: url('./img/background-v1.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;height:150px;">
    <div class="container" >
        <h1 style="color: #FAA61F;  background-color: rgba(0,0,0, 0.4);display:inline-block;padding:10px 15px 18px 15px; margin-top:10px;">e-service</h1>

    </div>
</section>
<section id="accueilSec">
<div class="container">
<?php if ($_SESSION["user"]["nom_role"] == 'staff') { ?>
    <h1 id="accueilSecHeader" class="mt-5 mb-5">Espace Staff <hr> </h1>
    <div class="row">
    <div class="col d-flex flex-column justify-content-center">
    <img class="mx-auto" src="./img/doc-v1.png" alt="" srcset="">
    <a class="text-center" href='<?php echo"./boite_demandes.php";?>'>Boite des demandes</a>
    <p class="text-center">consulter les demandes des candidats</p>

    </div>
    <div class="col d-flex flex-column justify-content-center">
    <img class="mx-auto" src="./img/notification-v1.png" alt="" srcset="">
    <a href="notifications.php" class="text-center">cree une notification</a>
    <p class="text-center">pour la creation des notifications</p>

    </div><div class="col d-flex flex-column justify-content-center">
    <img class="mx-auto" src="./img/convo-v1.png" alt="" srcset="">
    <a class="text-center">(encours)</a>
    <p class="text-center">xxxx xxxxxx xxxx xxxxxx xx xxxxx</p>

    </div>
</div>
    <?php } elseif($_SESSION["user"]["nom_role"] == 'doctorant') { ?>
 <h1 id="accueilSecHeader" class="mt-5 mb-5">Espace doctorant <hr> </h1>
   <div class="row">
    <div class="col d-flex flex-column justify-content-center">
    <img class="mx-auto" src="./img/doc-v1.png" alt="" srcset="">
    <a href="#" class="text-center">encours</a>

    </div>
    <div class="col d-flex flex-column justify-content-center">
    <img class="mx-auto" src="./img/notification-v1.png" alt="" srcset="">
    <a href="#" class="text-center">en cours</a>
    </div><div class="col d-flex flex-column justify-content-center">
    <img class="mx-auto" src="./img/convo-v1.png" alt="" srcset="">
    <a class="text-center">encours </a>

    </div>
</div>

    <?php } else { ?>
 <h1 id="accueilSecHeader" class="mt-5 mb-5">Espace condidat <hr> </h1>
    <div class="row">
    <div class="col d-flex flex-column justify-content-center">
    <img class="mx-auto" src="./img/doc-v1.png" alt="" srcset="">
    <a href="./info.php" class="text-center">deposer votre demande</a>
    <p class="text-center">espace pour deposer les demandes d'inscriptions</p>

    </div>
    <div class="col d-flex flex-column justify-content-center">
    <img class="mx-auto" src="./img/notification-v1.png" alt="" srcset="">
    <a href="#" class="text-center">en cours</a>
    <p class="text-center">xxxx xxxxx xxx xxx x xxxxx xxxxxx .</p>

    </div><div class="col d-flex flex-column justify-content-center">
    <img class="mx-auto" src="./img/convo-v1.png" alt="" srcset="">
    <a class="text-center">encours </a>
    <p class="text-center">xxxx xxxx xxxxx xxxx x xxxxxx x.</p>

    </div>
</div>
<?php } ?>
</section>
<?php include_once './includes/footer.php';
?>