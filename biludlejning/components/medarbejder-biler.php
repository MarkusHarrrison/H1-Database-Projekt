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
    <h2 class="mb-4">Alle biler</h2>
    <button type="button" class="btn btn-primary" style="padding: 0 15px; height: 40px; margin-left: 20px;" data-bs-toggle="modal" data-bs-target="#newModal"><i class="fa-solid fa-plus"></i> Opret ny bil</button>
</div>

<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="components/create-car.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Opret ny bil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Række 1 -->
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating">
                                <select class="form-select" id="CarBrand" name="CarBrandID" aria-label="Floating label select example" required>
                                    <option selected>Vælg fra listen</option>
                                    <?php
                                        while( $row = sqlsrv_fetch_array($stmt_CarBrand, SQLSRV_FETCH_ASSOC) ) {
                                            echo'<option value="'.$row["CarBrandID"].'">'.$row["BrandName"].'</option>';
                                        }
                                    ?>
                                </select>
                                <label for="CarBrand">Bilmærke</label>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating">
                                <select class="form-select" id="CarModel" name="CarModelID" aria-label="Floating label select example" required>
                                    <option selected>Vælg fra listen</option>
                                    <?php
                                        while( $row = sqlsrv_fetch_array($stmt_CarModel, SQLSRV_FETCH_ASSOC) ) {
                                            echo'<option value="'.$row["CarModelID"].'">'.$row["ModelName"].'</option>';
                                        }
                                    ?>
                                </select>
                                <label for="CarModel">Bilmodel</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Række 2 -->
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="CarYear" name="CarYear" placeholder="Årgang" required>
                                <label for="CarYear">Årgang</label>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating">
                                <select class="form-select" id="CarColorID" name="CarColorID" aria-label="Floating label select example required">
                                    <option selected>Vælg fra listen</option>
                                    <?php
                                        while( $row = sqlsrv_fetch_array($stmt_CarColor, SQLSRV_FETCH_ASSOC) ) {
                                            echo'<option value="'.$row["CarColorID"].'">'.$row["Color"].'</option>';
                                        }
                                    ?>
                                </select>
                                <label for="CarColorID">Farve</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Række 3 -->
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="HorsePower" name="HorsePower" placeholder="HorsePower" required>
                                <label for="HorsePower">Hestekræfter</label>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="Acceleration" name="Acceleration" placeholder="Acceleration" required>
                                <label for="Acceleration">0 - 100 KM/T</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Række 4 -->
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating">
                                <select class="form-select" id="CarFuelID" name="CarFuelID" aria-label="Floating label select example" required>
                                    <option selected>Vælg fra listen</option>
                                    <?php
                                        while( $row = sqlsrv_fetch_array($stmt_CarFuel, SQLSRV_FETCH_ASSOC) ) {
                                            echo'<option value="'.$row["CarFuelID"].'">'.$row["FuelType"].'</option>';
                                        }
                                    ?>
                                </select>
                                <label for="CarFuelID">Brændstof</label>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="Price" name="Price" placeholder="Price" required>
                                <label for="Price">Lejepris per dag</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Ja</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php

$tsql = "SELECT CarID, BrandName, ModelName, CarYear, Color, HorsePower, Acceleration, FuelType, Price
         FROM [dbo].[Cars] AS Cars
         INNER JOIN [dbo].[CarBrand] AS Brand ON Cars.CarBrandID = Brand.CarBrandID
         INNER JOIN [dbo].[CarModel] AS Model ON Cars.CarModelID = Model.CarModelID
         INNER JOIN [dbo].[CarColor] AS Color ON Cars.CarColorID = Color.CarColorID
         INNER JOIN [dbo].[CarFuel]  AS Fuel  ON Cars.CarFuelID = Fuel.CarFuelID;";

$stmt = sqlsrv_query( $conn, $tsql);   
if($stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

echo '
    <table class="table table-dark table-striped text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Bilmærke</th>
            <th scope="col">Bilmodel</th>
            <th scope="col">Årgang</th>
            <th scope="col">Farve</th>
            <th scope="col">HK</th>
            <th scope="col">0-100</th>
            <th scope="col">Brændstof</th>
            <th scope="col">Lejepris</th>
            <th scope="col"></th>
        </tr>';

while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
    echo '
        <tr>
            <td>' . $row["CarID"]. '</td>
            <td>' . $row["BrandName"]. '</td>
            <td>' . $row["ModelName"]. '</td>
            <td>' . $row["CarYear"]. '</td>
            <td>' . $row["Color"]. '</td>
            <td>' . $row["HorsePower"]. ' HK</td>
            <td>' . $row["Acceleration"]. ' sek.</td>
            <td>' . $row["FuelType"]. '</td>
            <td>' . $row["Price"]. ' kr. per dag</td>
            <td class="p-2"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletecarModal-' . $row["CarID"]. '"><i class="fa-solid fa-trash"></i> Slet</button></td>
        </tr>

        <div class="modal fade" id="deletecarModal-' . $row["CarID"]. '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="components/delete-car.php" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Slet bil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Er du sikker på at du vil slette denne ' . $row["BrandName"]. ' ' . $row["ModelName"]. '?<br>
                            <div class="row mt-3">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                    <input class="form-control w-50" name="CarID" type="text" value="' . $row["CarID"]. '" aria-label="' . $row["CarID"]. '" readonly>
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