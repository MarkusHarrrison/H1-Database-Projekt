<?php
$tsql = "SELECT CarID, BrandName, ModelName, CarYear, Color, HorsePower, Acceleration, FuelType, Price FROM [dbo].[Cars] AS Cars INNER JOIN [dbo].[CarBrand] AS Brand ON Cars.CarBrandID = Brand.CarBrandID INNER JOIN [dbo].[CarModel] AS Model ON Cars.CarModelID = Model.CarModelID INNER JOIN [dbo].[CarColor] AS Color ON Cars.CarColorID = Color.CarColorID INNER JOIN [dbo].[CarFuel] AS Fuel ON Cars.CarFuelID = Fuel.CarFuelID;";
$stmt = sqlsrv_query( $conn, $tsql);
?>

<div class="row">

    <?php
        while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
            echo'
                <div class="col-sm-3">
                    <div class="car-wrapper">
                        <h3>'.$row["BrandName"].' '.$row["ModelName"].'</h3>
                        <div class="price">
                            <span class="value">'.$row["Price"].' KR.</span>
                            <span>/dag</span>
                        </div>
                        <img src="assets/cars/'.$row["CarID"].'.png">
                        <div class="row">
                            <div class="col-4 text-center">
                                <i class="mh-icon fa-solid fa-flag-checkered"></i><br>
                                '.$row["Acceleration"].' Sek.
                            </div>
                            <div class="col-4 text-center">
                                <i class="mh-icon fa-solid fa-horse"></i><br>
                                '.$row["HorsePower"].' HK
                            </div>
                            <div class="col-4 text-center">
                                <i class="mh-icon fa-solid fa-gas-pump"></i><br>
                                '.$row["FuelType"].'
                            </div>
                        </div>
                        <a class="rent-button" href="new-customer?bil='.$row["CarID"].'">Lej denne bil</a>
                    </div>
                </div>
            ';
        }
    ?>

</div>