<?php

include "commande/commande.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <center>
    <div class="card w-50 m-5">
    <div class="card-body">
        <h3 class="card-title">Bienvenue</h3>
        <br>
        <form action="" method="post" enctype="multipart/form-data" class="w-25">
            choisissez votre spécialité
            <select name="spécialité" class="form-select me-2 mb-3">
                <option value="math">math</option>
                <option value="info">info</option>
                <option value="pc">physique</option>
            </select>
            
                <div class="custom-file mb-3">
                    <label for="fff">le fichie de type :<br>( zip ou rar) </label>
                    <Input type="hidden" name="max_file_size" value="1000000000">
                  <input name="fich" type="file" size=60><br>
                </div>
            </div>
            <input type="submit" value="Valide" class="button" name='ok'  style="background-color: #FF9C00;">
        </form>
        <?php
        if(isset($_GET['document'])) echo "<span class='alert alert-danger  w-100'>".'le fiche déjà ete chargé'."</span> <br><br>";
        if(isset($_GET['validedocument'])) echo "<span class='alert alert-danger  w-100'>".'le fichier  a été chargé avec succès'."</span> <br><br>";
        if(isset($_GET['errordetype'])) echo "<span class='alert alert-danger  w-100'>".'le fichier n\'est pas de type : (zip ou rar)'."</span> <br><br>";
        
                ?>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </center>
</body>
</html>
<?php
if(isset($_POST['ok'])){
  
   if(  isset($_POST['spécialité'])){
   
        if( !empty($_POST['spécialité']) )
        {
         $spc=htmlspecialchars(strip_tags($_POST['spécialité']));
       $sp=htmlspecialchars(strip_tags($_POST['spécialité']));
       if(!($_FILES['fich']['error'] >0)){
       $infosfichier=pathinfo($_FILES['fich']['name']);
              $extension_upload = $infosfichier['extension'];
              $extension_upload=strtolower($extension_upload);
               $tab=array("zip","rar");
               if(!in_array($extension_upload,$tab)){
                header("Location:info.php?errordetype ");
               exit(" ");}
               $documen=$_SESSION['users']['users_id'].$_SESSION['users']['nom'].".".$extension_upload;
               if(isset($_FILES['fich'])){
                  $dossier = 'C:\xamppnew\htdocs\TST\mhdi/';

                 $fichier = basename($_FILES['fich']['name']);
                 if(move_uploaded_file($_FILES['fich']['tmp_name'],$dossier.$documen))
                 {$documen='mhdi/'.$documen;
                 $ajout=ajoutedocumen($documen,$spc);
                 if($ajout==1)
                 header("Location:info.php?validedocument");
                }
                 else{
                      exit("Echec de l'upload !"); 
                     }}
                    }

        }
    }
    
}
?>