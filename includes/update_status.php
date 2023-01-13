<?php
session_start();
include_once '../db/db.php';
include_once'./func.inc.php';
$user_id = $_SESSION["user"]["user_id"];
if (isset($_POST["phase1"])) {
    $phase = $_POST["phase1"] ;
    updateInscriptionStatus($conn, $user_id, $phase);
}

if(isset($_POST["phase2"])){

    $phase = $_POST["phase2"];
    updateInscriptionStatus($conn, $user_id, $phase);
}
else{
    die("erooro");
}
header("Location: ../accueil/boite_demande.php");
exit();