<?php

$CarBrand = "SELECT CarBrandID, BrandName FROM [dbo].[CarBrand]";
$stmt_CarBrand = sqlsrv_query( $conn, $CarBrand);

$CarModel = "SELECT CarModelID, CarBrandID, ModelName FROM [dbo].[CarModel]";
$stmt_CarModel = sqlsrv_query( $conn, $CarModel);

$CarColor = "SELECT CarColorID, Color FROM [dbo].[CarColor]";
$stmt_CarColor = sqlsrv_query( $conn, $CarColor);

$CarFuel = "SELECT CarFuelID, FuelType FROM [dbo].[CarFuel]";
$stmt_CarFuel = sqlsrv_query( $conn, $CarFuel);

?>

<div class="d-flex">
    <h2 class="mb-4">Alle kunder</h2>
</div>

<?php

$tsql = "SELECT CustomerID, Firstname, Lastname, Email, Phone, License, CustomerAddress, City, PostalCode
FROM [dbo].[Customers] AS Customers
INNER JOIN [dbo].[City] AS City ON Customers.CityID = City.CityID";

$stmt = sqlsrv_query( $conn, $tsql);   
if($stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

echo '
    <table class="table table-dark table-striped text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Fornavn</th>
            <th scope="col">Efternavn</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefonnummer</th>
            <th scope="col">Kørekortnummer</th>
            <th scope="col">Adresse</th>
            <th scope="col">By</th>
            <th scope="col">Postnummer</th>
            <th scope="col"></th>
        </tr>';

while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
    echo '
        <tr>
            <td>' . $row["CustomerID"]. '</td>
            <td>' . $row["Firstname"]. '</td>
            <td>' . $row["Lastname"]. '</td>
            <td>' . $row["Email"]. '</td>
            <td>' . $row["Phone"]. '</td>
            <td>' . $row["License"]. '</td>
            <td>' . $row["CustomerAddress"]. '</td>
            <td>' . $row["City"]. '</td>
            <td>' . $row["PostalCode"]. '</td>
            <td class="p-2"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-' . $row["CustomerID"]. '"><i class="fa-solid fa-trash"></i> Slet</button></td>
        </tr>

        <div class="modal fade" id="deleteModal-' . $row["CustomerID"]. '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="components/delete-customer.php" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Slet bil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Er du sikker på at du vil slette ' . $row["Firstname"]. ' ' . $row["Lastname"]. '?<br>
                            <div class="row mt-3">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                    <input class="form-control w-50" name="CustomerID" type="text" value="' . $row["CustomerID"]. '" aria-label="' . $row["CustomerID"]. '" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Nej</button>
                            <button type="submit" class="btn btn-danger">Ja</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    ';
}

echo "</table>";

?>