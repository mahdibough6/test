<?php
$serverName = "DESKTOP-FLS1MF5\MSSQLSERVER01"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array("Database"=>"gestion_inscription");
    $conn =sqlsrv_connect($serverName, $connectionInfo);

    if( !$conn ) {
         exit("error de conection");
    }

?>