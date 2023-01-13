<?php


function getDemandes($conn){
    
        $sql="select * from dbo.users where nom_role='condidat'";
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) {
         die( print_r( sqlsrv_errors(), true) );
    }
    $data = array();
    $i = 0;
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        $data[$i] = $row;
        $i++;
    }
    sqlsrv_free_stmt( $stmt);
    return $data;

}

function downloadFile($conn, $condidat_id){

    $sql = "SELECT nom_doc FROM dbo.inscriptions WHERE condidat_id = '$condidat_id';";
    $stmt = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    
   $filePath = "..\\files\\".$row['nom_doc']; 
    
    header('Cache-Control: public');
  header('Content-Description: File Transfer');
  header('Content-Type: application/zip');
  header('Content-Disposition: attachment; filename="'.$row['nom_doc'].'"');
  header('Content-Transfer-Encoding: binary');


  readfile($filePath);
    sqlsrv_free_stmt($stmt);
    exit();

}

function updateInscriptionStatus($conn, $user_id, $phase){
    $sql = "exec dbo.updateInscriptionStatus @status = '$phase', @user_id='$user_id'";
    try{
    $stmt = sqlsrv_query($conn, $sql);
}
 catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
    
exit();
}