<?php

include 'config.php';

// Laver variabler for alle felter fra tidligere form
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$License = $_POST['License'];
$CustomerAddress = $_POST['CustomerAddress'];
$CityID = $_POST['CityID'];
$PostalCode = $_POST['PostalCode'];

// Indsætter data i tabellen Customers
$query_customer = "INSERT INTO [dbo].[Customers] (FirstName, LastName, Email, Phone, License, CustomerAddress, CityID, PostalCode)
VALUES ('$FirstName', '$LastName', '$Email', '$Phone', '$License', '$CustomerAddress', '$CityID', '$PostalCode')";
$result_customer = sqlsrv_query($conn, $query_customer);

// Henter Brugerid fra Tabellen Customers som passer med ovenstående email
$query_getid = "SELECT CustomerID FROM [dbo].[Customers] WHERE Email = '$Email';";
$result_getid = sqlsrv_query($conn, $query_getid);

$bil_id = $_GET['bil'];

?>

<!doctype html>
<html lang="da">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Database opgave | Markus Harrison</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>

    <div class="hero">
        <header class="p-3 bg-transparent text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <img src="assets/logo.svg" height="30px" class="mb-2 me-3">
                    </a>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-2 text-white">Forside</a></li>
                    </ul>
                    <div class="text-end">
                        <a href="medarbejder" class="btn btn-warning">Medarbejder-login</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="hero-content" style="height: 86.1vh;">
            <div class="container">
                <div class="form-wrapper bg-white w-50 mx-auto p-5 rounded shadow">
                    <div class="text-center">
                        <img src="assets/cars/<?php echo $_GET['bil']; ?>.png" class="order-image">
                    </div>
                    <?php include 'components/rent-form.php'; ?>
                </div>
            </div>
        </div>
    </div>

<?php include "template-parts/footer.php"; ?>