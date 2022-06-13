<?php

$serverName = "markusharrison.database.windows.net";
$connectionOptions = array(
    "Database" => "adventure",
    "Uid" => "markusharrison",
    "PWD" => "_Plakater2019!_"
);

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}