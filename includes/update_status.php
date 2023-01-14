<?php
session_start();
include_once '../db/db.php';
include_once'./func.inc.php';
if(isset($_POST["phase1"])&&isset($_POST["phase2"])){

$user_id = $_POST["id"];
    $phase = $_POST["phase2"];
    updateInscriptionStatus($conn, $user_id, $phase);
    exit();
}
if (isset($_POST["phase1"])) {
    $phase = $_POST["phase1"] ;
$user_id = $_POST["id"];
    echo $phase;
    updateInscriptionStatus($conn, $user_id, $phase);
    exit();
}

if(isset($_POST["phase2"])){

$user_id = $_POST["id"];
    $phase = $_POST["phase2"];
    updateInscriptionStatus($conn, $user_id, $phase);
    exit();
}
else{
    echo"fiesjlif";
    die("erooro");
}
echo "hi";
exit();