<?php
session_start();
if (isset($_POST['submit'])) {
    include_once './func.inc.php';
    include_once '../db/db.php';
    $fileName = $_POST['fileName'];
    echo $fileName;
    downloadFile($fileName);
    //header("Location: ../accueil/boite_demandes.php");
    //exit();

}
else {
    echo "hi";
}