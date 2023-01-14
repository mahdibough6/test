<?php

//session_start();

function getDemandes($conn){
    
        $sql="select  * from dbo.getAllInscriptions();";
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) {
         die( print_r( sqlsrv_errors(), true) );
    }
    $data = array();
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        $data[] = $row;
    }
    sqlsrv_free_stmt( $stmt);
    return $data;

}

function downloadFile($fileName){

   
    
   $filePath = dirname(dirname(__FILE__))."\\assets\\".$fileName; 
 if(file_exists($filePath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/x-rar-compressed');
    header('Content-Disposition: attachment; filename="'.$fileName.'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
  readfile($filePath);
    exit();
}
else{
    echo $filePath;
    echo" error downloading file";
}
   

}

function updateInscriptionStatus($conn, $user_id, $phase){
    $sql = "exec dbo.updateInscriptionStatus @status = '$phase', @user_id='$user_id'";
    try{
    $stmt = sqlsrv_query($conn, $sql);
}
 catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
   header("Location: ../boite_demandes.php");
    
exit();
}




function ajoute($nom,$prenom,$tel,$email,$mot){
if(require("./db/db.php")){
    $ch="select count(*) from dbo.user where email='$email'";
    $st=sqlsrv_query($conn, $ch);
    $data=sqlsrv_fetch_array($st);
    //pour teste est ce que  l'email exists deja dans labase de donnees
if($data[0]==0){
    $sql="insert into dbo.user(nom,prenom,tele,email,pass,nom_role)
     values('$nom','$prenom','$tel','$email','$mot','candidat');";
     $stmt=sqlsrv_query($conn, $sql);
    if(!$stmt){exit("error de l'insertion " );}
    else {return (1);}
}
else{
   header("Location:signup.php?error");
}
    sqlsrv_close($con);
}
}
// fonction pour teste le numro de telephone
function testtele($tel){
    if(preg_match("/^(06|07)(( |_|\/||-)[[:digit:]]{2}){4}$/",$tel))
      {
        return 1;
      }else{
        header("Location:signup.php?teleinvalide");
        return 0;
      }
}
//fonction pour teste l'email
function testemail($email){
    if(preg_match("/^[[:alnum:]_-]+@[[:alpha:]]{5,}\.[[:alpha:]]{2,3}$/",$email))
      {
        return 1;
      }else{
        header("Location:signup.php?emailinvalide");
        return 0;
      }
} 
//fonction pour teste la longure de mot de passe
function testpass($mot){
    if((strlen($mot)>6) && (strlen($mot))<25)
      {
        return 1;
      }else{
        header("Location:signup.php?passinvalide");
        return 0;
      }
}



//fonction bax red SESSION

function getadmin($conn, $email,$mot){
        $ch="select count(*) from dbo.users where email='$email' and pass='$mot'";
        $st=sqlsrv_query($conn, $ch);
        $data=sqlsrv_fetch_array($st);
        //pour teste est ce que  ce compte exists
    if($data[0]!=0){
        $sql="select * from dbo.users where email='$email' and pass='$mot'";
         $stmt =sqlsrv_query($conn, $sql);
        if($stmt){
            $data=sqlsrv_fetch_array($stmt);

            $table=array('user_id' =>$data[0],'nom' => $data[1],'prenom' => $data[2],'email' => $data[3],'tele' => $data[4],'pass' => $data[5],'nom_role' => $data[6]);

            return ($table);
        }
    }
    else{
       header("Location:login.php?MOTEMAIL");
    }

       
        sqlsrv_close($conn);
    }

// fonction pour l'inscription et l'ajoute des documens
 function ajoutedocumen($documen,$spc){
    
    if(require("./db/db.php")){
        // la requite pour  trouver id de  l'admin qui possede le mois des candidats
$chec="exec dbo.getStaffHasLessCondidats";
// la requête pour trouver n'importe  id admin
$chec2="select top 1 AA.user_id  from dbo.users as AA where nom_role='staff'";
$ATX2=sqlsrv_query($conn, $chec2);
        $DTR2=sqlsrv_fetch_array($ATX2);
        $idadmin2=$DTR2[0];
$ATX=sqlsrv_query($conn, $chec);
        $DTR=sqlsrv_fetch_array($ATX);
        


        if(!$DTR){
            $idadmin=$idadmin2;
        }
        else{

        $idadmin=$DTR2[0];
        }
        $ch="select count(*) from dbo.inscriptions where nom_doc='$documen' ";
        $st=sqlsrv_query($conn, $ch);
        $data=sqlsrv_fetch_array($st);
        //teste est ce que le documen deja ete charge*/
    if($data[0]==0){

        $id=$_SESSION['user']['user_id'];
        $dat=date("Y-m-d");
        $sql="insert into dbo.inscriptions(date_inscription,nom_doc,spec,status,staff_id,condidat_id)
     values('$dat','$documen','$spc','encours','$idadmin','$id');";
     $stmt=sqlsrv_query($conn, $sql);
     if( $stmt === false ) {
        if( ($errors = sqlsrv_errors() ) != null) {
            foreach( $errors as $error ) {
                echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
                echo "code: ".$error[ 'code']."<br />";
                echo "message: ".$error[ 'message']."<br />";
            }
        }
    }
    if(!$stmt){
        echo $data[0];
        echo $documen;
        exit("error de l'insertion " );}

    else {return (1);}
        }

    else{
       header("Location:info.php?document");
        sqlsrv_close($conn);
    }
}
 }
function createNotification($conn, $staff_id, $fileName, $titre, $text){
    
        $date_notification=date("Y-m-d");
  $sql = "exec dbo.createNotification @date_notification='$date_notification', @titre_notification='$titre', @text_notification='$text', @nom_doc_not='$fileName', @staff_id='$staff_id'";
     $stmt=sqlsrv_query($conn, $sql);
if( $stmt === false ) {
        if( ($errors = sqlsrv_errors() ) != null) {
            foreach( $errors as $error ) {
                echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
                echo "code: ".$error[ 'code']."<br />";
                echo "message: ".$error[ 'message']."<br />";
                die("hi");
            }
        }
    }
}