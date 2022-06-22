<?php

$tsql = "SELECT TOP (10) * FROM [SalesLT].[Customer] order by newid()";

$stmt = sqlsrv_query( $conn, $tsql);   
if($stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

echo '
    <table class="table table-dark table-striped text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Fornavn</th>
            <th scope="col">Efternavn</th>
            <th scope="col">E-mail</th>
        </tr>';

while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
    echo "
        <tr>
            <td>" . $row["CustomerID"]. "</td>
            <td>" . $row["Title"]. "</td>
            <td>" . $row["FirstName"]. "</td>
            <td>" . $row["LastName"]. "</td>
            <td>" . $row["EmailAddress"]. "</td>
        </tr>
    ";
}

echo "</table>";

?>