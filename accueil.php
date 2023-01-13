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
<section>
<div class="container">
<?php if (true) { ?>
    <h1 class="mt-5 mb-5">Espace Staff</h1>
    <div class="row">
    <div class="col d-flex flex-column justify-content-center">
    <img class="mx-auto" src="./img/doc-v1.png" alt="" srcset="">
    <a class="text-center" href='<?php echo"./boite_demandes.php";?>'>Boite des demandes</a>
    <p class="text-center">this is an image of a document that represents the demands of inscription</p>

    </div>
    <div class="col d-flex flex-column justify-content-center">
    <img class="mx-auto" src="./img/notification-v1.png" alt="" srcset="">
    <a class="text-center">les demande d'inscription</a>
    <p class="text-center">this is an image of a document that represents the demands of inscription</p>

    </div><div class="col d-flex flex-column justify-content-center">
    <img class="mx-auto" src="./img/convo-v1.png" alt="" srcset="">
    <a class="text-center">les demande d'inscription</a>
    <p class="text-center">this is an image of a document that represents the demands of inscription</p>

    </div>
</div>
    <?php } elseif(true) { ?>
        <h1>doctorant</h1>
        <div class="row">
    <div class="col d-flex flex-column justify-content-center">
    <figure>
    <img class="mx-auto" src="../img/doc-v1.png" alt="" srcset="">
    <figcaption class="text-center">boite des desmandes</figcaption>
    <div class="text-center">this is an image of a document that represents the demands of inscription</div>
</figure>

    </div>
    <div class="col d-flex flex-column justify-content-center">
    <figure>
    <img class="mx-auto" src="../img/notification-v1.png" alt="" srcset="">
    <figcaption class="text-center">les demande d'inscription</figcaption>
    <div class="text-center">this is an image of a document that represents the demands of inscription</div>
</figure>

    </div><div class="col d-flex flex-column justify-content-center">
    <figure>
    <img class="mx-auto" src="../img/convo-v1.png" alt="" srcset="">
    <figcaption class="text-center">les demande d'inscription</figcaption>
    <div class="text-center">this is an image of a document that represents the demands of inscription</div>
</figure>

    </div>
</div>

    <?php } else { ?>

        <h1>condidat</h1>
    <div class="row">
        <div class="col">
            <img src="../img/doc-v1.png" alt="" srcset="">
            <legend>les demande d'inscription</legend>
        </div>
        <div class="col"> 
            <img src="../img/notification-v1.png" alt="" srcset="">
            <legend>notifications</legend>
        </div>
        <div class="col">
            <img src="../img/notification-v1.png" alt="">
            <legend>convocations</legend>
        </div>
    </div>
        <?php } ?>
</div>
</section>

<?php include_once './includes/footer.php';
?>