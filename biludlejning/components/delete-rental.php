<?php

include '../config.php';

// Laver variabel for CarID
$RentalID = $_POST['RentalID'];

// Sletter række i tabellen Cars hvor CarID matcher
$query_delete_car = "DELETE FROM [dbo].[Rentals] WHERE RentalID=$RentalID;";
$result_delete_car = sqlsrv_query($conn, $query_delete_car);

if (!$result_delete_car) {
    $message  = 'Udlejningen kan ikke slettes.';
    die($message);
} else {
    header('Location: ../medarbejder');
}

?>