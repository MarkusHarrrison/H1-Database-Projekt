<?php

include '../config.php';

// Laver variabel for CustomerID
$CustomerID = $_POST['CustomerID'];

// Sletter række i tabellen Customers hvor CustomerID matcher
$query_delete_customer = "DELETE FROM [dbo].[Customers] WHERE CustomerID=$CustomerID;";
$result_delete_customer = sqlsrv_query($conn, $query_delete_customer);

if (!$result_delete_customer) {
    $message  = 'Kunden kan ikke slettes. Tjek om denne kunde har nogle udlejninger.';
    die($message);
} else {
    header('Location: ../medarbejder');
}

?>