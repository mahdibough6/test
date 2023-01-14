<?php
session_start();
include_once './func.inc.php';
include_once '../db/db.php';
if(isset($_POST["submit"])){

  $title = $_POST["titre"];
  $sujet = $_POST["sujet"];

        $file = $_FILES['file'];
        
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_error = $file['error'];
        $user_id = $_SESSION['user']['user_id'];
        
        if($file_error === 0){
              $file_name_new = uniqid('', true) . $file_name;
              $file_destination = dirname(dirname(__FILE__))."\\assets\\" . $file_name_new;
              if(move_uploaded_file($file_tmp, $file_destination)){
                createNotification($conn, $user_id,$file_name_new,$title, $sujet);
                echo "File uploaded successfully.";
                header("Location: ../index.php");
                exit();
              }
        }
      }
      
else{
        echo"file not found";
      }