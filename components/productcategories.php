<?php

$tsql = "SELECT TOP (10) * FROM [SalesLT].[ProductCategory] order by newid()";

$stmt = sqlsrv_query( $conn, $tsql);   
if($stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

echo '
    <table class="table table-dark table-striped text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kategori</th>
        </tr>';

while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
    echo "
        <tr>
            <td>" . $row["ProductCategoryID"]. "</td>
            <td>" . $row["Name"]. "</td>
        </tr>
    ";
}

echo "</table>";

?>

<button type="button" class="btn btn-warning rounded-0 py-1 px-4">Se alle produktkategorier</button>