<?php
//le ficher commande contien toute les fonctions
include_once './includes/func.inc.php';
//include "commande/commande.php";

?>
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
        <div class="login-box">
            <h1>LOGIN</h1>
                <form method="POST" >
                    <div class="textbox ">
                        <i class="fa fa-envelope " aria-hidden="true"></i>
                        <input type="text" placeholder="Email"name="email">
                    </div>

                    <div class="textbox">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" name="password" placeholder="password" >
                    </div><br>
					<?php 
                    
						if(isset($_GET['MOTEMAIL'])) echo "<span class='alert alert-danger  w-100'>".'mot de passe ou l\'email incorrect'."</span> <br><br>";
					?>
                    <input type="submit" value="Sign In" class="button" name='ok'  style="background-color: #FF9C00;">
                    <p class="text-center" style="color: black;">you don't have an account <a href="signup.php">sign up</a></p>
                </form>
        </div>
            <br>
            <br>
      
 <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>            
<?php

if(isset($_POST['ok'])){
  
   if( isset($_POST['email']) and isset($_POST['password'])){
     
        if(!empty($_POST['email']) and !empty($_POST['password'])){
       
       $email=htmlspecialchars(strip_tags($_POST['email']));
       $mot=htmlspecialchars(strip_tags($_POST['password']));
        include_once './db/db.php' ;
       $admin=getadmin($conn, $email,$mot);
if($admin){
    //cette  $_SESSION pour le user 
    session_start();
  $_SESSION['user']=$admin;
  header("Location: ./accueil.php");
}
    }
    }
}
?>