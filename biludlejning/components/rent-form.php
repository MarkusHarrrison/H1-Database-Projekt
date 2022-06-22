<?php
$by = "SELECT CityID, City FROM [dbo].[City]";
$stmt_by = sqlsrv_query( $conn, $by);
?>



<form action="rent-submit.php?bil=<?php echo $bil_id; ?>&CustomerID=<?php while( $row = sqlsrv_fetch_array( $result_getid, SQLSRV_FETCH_ASSOC) ) { echo $row['CustomerID'];} ?>"method="POST">

    <script>
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
    </script>

    <div class="row">
        <div class="col-sm">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="RentTime" placeholder="Antal lejedage" value="1" onchange="set_return_date(today,this.value);">
                <label for="floatingInput">Antal lejedage</label>
            </div>
        </div>
        <div class="col-sm">
            <div class="row">
                <div class="col-sm">
                    <span>Afhentning</span>
                    <script>
                        document.write(dd + '/' + mm + '/' + yyyy);
                    </script>
                </div>
                <div class="col-sm">
                    <span>Aflevering</span>
                    <span id="return_date"></span>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-3">Bekræft leje</button>

</form>

<script>
    function set_return_date(date,days) {
        var result = new Date(date);
        result.setDate(date.getDate() + parseInt(days));
        document.querySelector("#return_date").innerHTML = String(result.getDate()).padStart(2, '0') + "/" + String(result.getMonth() + 1).padStart(2, '0') + "/" + result.getFullYear();
    }
    set_return_date(today,1);
</script>