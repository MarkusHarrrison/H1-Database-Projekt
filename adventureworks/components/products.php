<?php

$tsql = "SELECT TOP (10) * FROM [SalesLT].[Product] order by newid()";

$stmt = sqlsrv_query( $conn, $tsql);   
if($stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

echo '
    <table class="table table-dark table-striped text-white">
        <tr>
            <th scope="col">SKU</th>
            <th scope="col">Produktnavn</th>
            <th scope="col">Farve</th>
            <th scope="col">Salgspris</th>
            <th scope="col">Vægt</th>
        </tr>';


while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
    $weight = $row["Weight"];
    $price = $row["ListPrice"];
    $color = $row["Color"];
    echo "
        <tr>
            <td>" . $row["ProductNumber"]. "</td>
            <td>" . $row["Name"]. "</td>
        <td>";
    
    if (empty($color)) {
        echo 'Farve er ikke defineret';
    } else {
        echo $color;
    }
            
    echo"</td><td>$";

    echo number_format((float)$price, 2, '.', '');
        
    echo "</td><td>";

    if (empty($weight)) {
        echo 'Vægt er ikke defineret';
    } else {
        echo $weight . " gram";
    }

    echo "</td></tr>";
}

echo "</table>";

?>