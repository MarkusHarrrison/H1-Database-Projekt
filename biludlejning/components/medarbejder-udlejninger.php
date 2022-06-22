<div class="d-flex">
    <h2 class="mb-4">Alle udlejninger</h2>
</div>

<?php

$tsql= "SELECT RentalID, FirstName, LastName, BrandName, ModelName
FROM [dbo].[Rentals] AS Rentals
INNER JOIN [dbo].[Customers] AS Customers ON Rentals.CustomerID = Customers.CustomerID
INNER JOIN [dbo].[Cars] AS Cars ON Rentals.CarID = Cars.CarID
INNER JOIN [dbo].[CarBrand] AS CarBrand ON Cars.CarBrandID = CarBrand.CarBrandID
INNER JOIN [dbo].[CarModel] AS CarModel ON Cars.CarModelID = CarModel.CarModelID";

$stmt = sqlsrv_query( $conn, $tsql);   
if($stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

echo '
    <table class="table table-dark table-striped text-white">
        <tr>
            <th scope="col">Udlejnings id</th>
            <th scope="col">Fornavn</th>
            <th scope="col">Efternavn</th>
            <th scope="col">Bilmærke</th>
            <th scope="col">Bilmodel</th>
            <th scope="col">Antal lejedage</th>
            <th scope="col"></th>
        </tr>';

while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
    echo '
        <tr>
            <td>' . $row["RentalID"]. '</td>
            <td>' . $row["FirstName"]. '</td>
            <td>' . $row["LastName"]. '</td>
            <td>' . $row["BrandName"]. '</td>
            <td>' . $row["ModelName"]. '</td>
            <td>N/A</td>
            <td class="p-2"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleterentModal-' . $row["RentalID"]. '"><i class="fa-solid fa-trash"></i> Slet</button></td>
        </tr>

        <div class="modal fade" id="deleterentModal-' . $row["RentalID"]. '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="components/delete-rental.php" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Slet bil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Er du sikker på at du vil slette denne udlejning for ' . $row["FirstName"]. ' ' . $row["LastName"]. '?<br>
                            <div class="row mt-3">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                    <input class="form-control w-50" name="RentalID" type="text" value="' . $row["RentalID"]. '" aria-label="' . $row["RentalID"]. '" readonly>
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