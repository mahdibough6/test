<?php
/* https://www.php.net/manual/en/ref.sqlsrv.php */
$serverName = "127.0.0.1,1433\MSSQLSERVER"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"gestion_inscription","UID"=>"beta", "PWD"=>"f");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if(!isset($_SESSION["sysIsOn"])){
     $script = file_get_contents('./db/sql/init.sql');
     $stmt = sqlsrv_query($conn, $script);

if ($stmt === false) {
     die(print_r(sqlsrv_errors(), true));
}
$_SESSION["sysIsOn"] = true;
}
if( !$conn ) {
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}