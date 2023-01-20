<?php
//require("commande/commande.php");
include_once './includes/func.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <title>inscription</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="login_style.css">
	
    </head>

<body>
            <div  class="login-box">
                <h1>S'INSCRIRE</h1>
                <form method="POST" >

                <?php 
						if(isset($_GET['error'])) echo "<span class='alert alert-danger  w-100'>".'se compte exists déjà'."</span> <br><br>";
                        if(isset($_GET['valide'])) echo "<span class='alert alert-danger  w-100'>".'compte crée avec succès'."</span> <br><br>";
                        
                    ?>
                    <div class="textbox">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" placeholder="Nom"name="nom">
                    </div>

                    <div class="textbox">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="prenom" placeholder="Prenom" >
                    </div>
                 
                    <div class="textbox">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <input type="text" name="tele" placeholder="Telephone" >
                    </div>
                    <?php 
						if(isset($_GET['teleinvalide'])) echo "<p> le numéro de téléphone inccorecte </p><br><br>";
                       
                    ?>
                    <div class="textbox">
                    <i class="fa fa-envelope " aria-hidden="true"></i>
                        <input type="text" name="email" placeholder="email" >
                    </div>

                    <?php 
						if(isset($_GET['emailinvalide'])) echo "<p> l'email de téléphone inccorecte<br>l'email sous la forme  *****@*****.*** </p><br><br>";
                       
                    ?>

                    <div class="textbox">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" name="pass" placeholder="Mot de passe" >
                    </div>
                    <?php 
						if(isset($_GET['passinvalide'])) echo "<p> au moins 6 chiffre ou lettre </p><br><br>";
                       
                    ?>
                    <input type="submit" value="Sign Up" name="ok" class="button">
                    <p class="text-center" style="color: black;">vous avez deja un compte ? <a href="login.php">se connecter</a></p>
                
                </form>
            </div> 

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
<?php
if(isset($_POST['ok'])){
    if( isset($_POST['nom']) and isset($_POST['prenom'])  and isset($_POST['tele']) and isset($_POST['email']) and isset($_POST['pass'])){
         if(!empty($_POST['prenom']) and !empty($_POST['nom']) and  !empty($_POST['tele'])
         and !empty($_POST['email']) and !empty($_POST['pass']))
         {
         $prenom=htmlspecialchars(strip_tags($_POST['prenom']));
        $nom=htmlspecialchars(strip_tags($_POST['nom']));
        $tel=htmlspecialchars(strip_tags($_POST['tele']));
        $email=htmlspecialchars(strip_tags($_POST['email']));
        $mot=htmlspecialchars(strip_tags($_POST['pass']));
         // pour teste la forme comment ecrrire le numro telepone et l'email....
      if(testtele($tel)==1 && testemail($email)==1 && testpass($mot)==1){
         try{
          $nb=ajoute($nom,$prenom,$tel,$email,$mot);
          if($nb==1){
            header("Location:signup.php?valide");
            }
            
         }catch(Exception $e){
          $e->getMessage();
         }}
 
         
     }
 }
 }
 
 ?>