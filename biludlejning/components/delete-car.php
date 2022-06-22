<?php

include '../config.php';

// Laver variabel for CarID
$CarID = $_POST['CarID'];

// Sletter række i tabellen Cars hvor CarID matcher
$query_delete_car = "DELETE FROM [dbo].[Cars] WHERE CarID=$CarID;";
$result_delete_car = sqlsrv_query($conn, $query_delete_car);

if (!$result_delete_car) {
    $message  = 'Bilen kan ikke slettes. Tjek om denne bil er udlejet.';
    die($message);
} else {
    header('Location: ../medarbejder');
}

?>