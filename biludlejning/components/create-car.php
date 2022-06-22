<?php

include '../config.php';

// Laver variabler fra formular
$CarBrandID = $_POST['CarBrandID'];
$CarModelID = $_POST['CarModelID'];
$CarYear = $_POST['CarYear'];
$CarColorID = $_POST['CarColorID'];
$HorsePower = $_POST['HorsePower'];
$Acceleration = $_POST['Acceleration'];
$CarFuelID = $_POST['CarFuelID'];
$Price = $_POST['Price'];

// Indsætter data i tabellen Customers
$query_create_car = "INSERT INTO [dbo].[Cars] (CarBrandID, CarModelID, CarYear, CarColorID, HorsePower, Acceleration, CarFuelID, Price)
VALUES ('$CarBrandID', '$CarModelID', '$CarYear', '$CarColorID', '$HorsePower', '$Acceleration', '$CarFuelID', '$Price')";

$result_create_car = sqlsrv_query($conn, $query_create_car);

header('Location: ../medarbejder');

?>