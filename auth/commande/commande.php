<?php
session_start();
// fonction pour ajoute les users

function ajoute($nom,$prenom,$tel,$email,$mot){
if(require("./connexion/connecxion.php")){
    $ch="select count(*) from dbo.users where email='$email'";
    $st=sqlsrv_query($conn, $ch);
    $data=sqlsrv_fetch_array($st);
    //pour teste est ce que  l'email exists deja dans labase de donnees
if($data[0]==0){
    $sql="insert into dbo.users(nom,prenom,tele,email,pass,nom_role)
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

function getadmin($email,$mot){
    if(require("./connexion/connecxion.php")){
        $ch="select count(*) from dbo.users where email='$email' and pass='$mot'";
        $st=sqlsrv_query($conn, $ch);
        $data=sqlsrv_fetch_array($st);
        //pour teste est ce que  ce compte exists
    if($data[0]!=0){
        $sql="select * from dbo.users where email='$email' and pass='$mot'";
         $stmt =sqlsrv_query( $conn, $sql);
        if($stmt){
            $data=sqlsrv_fetch_array($stmt);

            $table=array('users_id' =>$data[0],'nom' => $data[1],'prenom' => $data[2],'email' => $data[3],'tele' => $data[4],'pass' => $data[5],'nom_role' => $data[6]);

            return ($table);
        }
    }
    else{
       header("Location:login.php?MOTEMAIL");
    }

       
        sqlsrv_close($conn);
    }
}

// fonction pour l'inscription et l'ajoute des documens
 function ajoutedocumen($documen,$spc){
    
    if(require("./connexion/connecxion.php")){
        // la requite pour  trouver id de  l'admin qui possede le mois des candidats
$chec="select top 1 AA.users_id,count(condidat_id) as cn from dbo.users as AA,dbo.inscriptions as AD 
where AD.staff_id=AA.users_id and nom_role='admin' group by AA.users_id
order by cn asc";
// la requête pour trouver n'importe  id admin
$chec2="select top 1 AA.users_id  from dbo.users as AA where nom_role='admin'";
$ATX2=sqlsrv_query($conn, $chec2);
        $DTR2=sqlsrv_fetch_array($ATX2);
        $idadmin2=$DTR2[0];
$ATX=sqlsrv_query($conn, $chec);
        $DTR=sqlsrv_fetch_array($ATX);
        $idadmin=$DTR[0];

        if(!$idadmin){
            $idadmin=$idadmin2;
        }
        $ch="select count(*) from dbo.inscriptions where nom_doc='$documen' ";
        $st=sqlsrv_query($conn, $ch);
        $data=sqlsrv_fetch_array($st);
        //teste est ce que le documen deja ete charge
    if($data[0]==0){
        $id=$_SESSION['users']['users_id'];
        $dat=date("Y-m-d");
        $sql="insert into dbo.inscriptions(date_inscription,nom_doc,specialite,status,staff_id,condidat_id)
     values('$dat','$documen','$spc','en cour','$idadmin','$id');";
     $stmt=sqlsrv_query($conn, $sql);
    if(!$stmt){exit("error de l'insertion " );}
    else {return (1);}
        }

    else{
       header("Location:info.php?document");
        sqlsrv_close($conn);
    }
}
 }
?>