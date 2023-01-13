<?php
session_start();
if (isset($_POST['submit'])) {
    include_once './func.inc.php';
    include_once '../db/db.php';
    //$user_id = $_SESSION["users"]["user_id"];
    //downloadFile($conn, $user_id);
    header("Location: ../accueil/boite_demandes.php");
    exit();

}
else {
    echo "hi";
}