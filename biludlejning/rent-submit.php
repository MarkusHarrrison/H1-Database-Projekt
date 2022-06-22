<?php

include 'config.php';

// Laver variabler for alle felter fra tidligere form
$CustomerID = $_GET['CustomerID'];
$CarID = $_GET['bil'];
$RentTime = $_POST['RentTime'];

$RentStart = "";
$RentEnd = "";

// Indsætter data i tabellen Rentals
$query_rent = "INSERT INTO [dbo].[Rentals] (CustomerID, CarID, Rentstart, RentEnd)
VALUES ('$CustomerID', '$CarID', '$RentStart', '$RentEnd')";

$result_rent = sqlsrv_query($conn, $query_rent);

?>

<?php include 'template-parts/header-hero.php' ?>

<div class="hero-content" style="height: 86.1vh;">
    <div class="container">
        <div class="form-wrapper bg-white w-50 mx-auto p-5 rounded shadow">
            <div class="text-center">
                <img src="assets/cars/<?php echo $_GET['bil']; ?>.png" class="order-image">
            </div>
            <h1 class="text-center">Tak for din booking!</h1>
        </div>
    </div>
</div>

<?php include "template-parts/footer.php"; ?>