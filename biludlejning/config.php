<?php

// Variable med servernavn til brug i min conn
$serverName = "markusharrison.database.windows.net";

// Variable med array som indholder data til min conn
$ServerData = array(
    "Database" => "biludlejning",
    "Uid" => "markusharrison",
    "PWD" => "_Plakater2019!_"
);

// Opret forbindelse til databasen
$conn = sqlsrv_connect($serverName, $ServerData);

// Hvis ikke der kan oprettes forbindelse skal der printes en fejlbesked
if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}