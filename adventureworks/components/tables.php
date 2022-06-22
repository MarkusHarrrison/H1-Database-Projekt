<?php

$tsql = "SELECT TOP (10) * FROM sys.Tables order by newid()";

$stmt = sqlsrv_query( $conn, $tsql);   
if($stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

echo '
    <table class="table table-dark table-striped text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tabelnavn</th>
        </tr>';

while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
    echo "
        <tr>
            <td>" . $row["object_id"]. "</td>
            <td>" . $row["name"]. "</td>
        </tr>
    ";
}

echo "</table>";

?>