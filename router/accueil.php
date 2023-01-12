<?php
session_start();
if($_SESSION["isConnected"]){
    header("Location: ../accueil/index.php");
    exit();
}
else{
    header("Location: ../index.php");
    exit();
}