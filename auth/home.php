<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="login_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>acceuil</title>
</head>
<body>
    <?php  include_once("navbar.php");      ?>

    
    <div class="d-flex justify-content-around">
        <div class="w-50 mt-5">
            <img src="pics/home.svg" class="w-75 mt-5">
        </div>
        <div class="w-50">
            <section id="actulalites" class="actulalites pt32 pb32">							
                <h1><font style="font-size: 50px;">Actualités</font></h1>
                <div class="card w-100">
                    <div class="card-body">
                        <ul class="event-list card-text">
                            <li>
                                <span class="text-center fa fa-info-circle fa-3x p-1 bg-bleu"></span>
                                <div class="info" style="">
                                    <span class="pulsate float-right badge badge-danger m-0">N</span>
                                    <h3 class="title text-truncate">DEUST: Calendrier des contrôles partie 2 session d'automne 2022-2023</h3>
                                    <p class="desc"></p>
                                    <ul>
                                        <li style="width:50%;" class="text-muted ">
                                            <time class="timeago" datetime="2023-01-05T10:01:01Z"></time>
                                        </li>
                                    </ul> 
                                </div>
                                <a class="lien" href="/actualite/255"></a>
                            </li>	
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
    <?php  include_once("footer.html");      ?>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>