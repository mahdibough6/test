
<?php 
session_start();
$pageTitle = "home";
include_once'./includes/header.php';
include_once'./db/db.php';
include_once'./includes/func.inc.php';
?>
<section id="welcomeSec" class="p-5">
        <h1 class="titre">PRÉINSCRIPTION</h1>
        <p>La réinscription au cycle doctoral répond à un certain nombre de règles bien précises. <br> Tout d’abord, l’étudiant doit s’inscrire en ligne sur le lien suivant: XXXXXXX.<br> Ensuite, l’étudiant doit imprimer le reçu qu’il doit joindre à son dossier de réinscription qui se</p>
        <a href="
        <?php
        if (isset($_SESSION["user"])) {
            echo"./info.php";
        }
        else{
            echo"./login.php";
        }
        ?>
        " class="btn p-2 mt-5" style="background-color:#FAA61F; color:aliceblue;">déposer votre dossier</a>
</section>
    
    <h1 class="mt-2 ms-5">Actualités</h1>
    <div class=" body d-flex justify-content-between">
        <div class="w-50 mt-2 card act p-3 m-5">
        <h2>Centre Des Etudes Doctorales</h2>
            <p>L'univesité sultan moulay slimane dispose de trois Centres d’Etudes doctorales <br>
             offrant des formations doctorales de haut niveau dans de nombreuses disciplines :<br>
            <ul>
                <li>Sciences et Techniques</li>
                <li>Lettres, Sciences Humaines et Arts</li>
                <li>Droit, Economie et Gestion</li>
            </ul>
            <img src="./img/home.svg" class="w-75 mt-5">
        </div>
        <div class="w-50 mt-2 card act p-3 m-5">							
                <h2><font style="font-size: 40px;">Avis</font></h2>
                <?php   include_once("./db/db.php");
                        $req = "select * from dbo.notifications";
                        $result = sqlsrv_query($conn,$req);
                        while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)):
                  $id = $row['notification_id'];
                        $title = $row['titre_notification'];?>
                <div class="card w-100 mb-3">
                    <div class="card-body">
                                <div class="info" style="">
                                    <div class="d-flex">
                    <img src="./img/not-icon-v1.png" width="30px"  class="me-2" alt="">
                                    <h5 class="title text-truncate"><?= $title; ?></h5>
</div>
                                </div>
                                <?php echo '<a class="card-link" href="annonce.php?id=' . $id . '">Voir Plus</a>';?>
                    </div>
                </div>
                <?php endwhile; ?>
        </div>
    </div>



<?php

include './includes/footer.php';

?>