<?php
$by = "SELECT CityID, City FROM [dbo].[City]";
$stmt_by = sqlsrv_query( $conn, $by);

$bil_id = $_GET['bil'];
?>



<form action="create-rent?bil=<?php echo $bil_id; ?>" method="POST">

    <p class="text-black-50 fs-5 fw-semibold">Er du ny kunde?</p>

    <!-- Række 1 -->
    <div class="row">
        <div class="col-sm">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="FirstName" placeholder="Fornavn">
                <label for="floatingInput">Fornavn</label>
            </div>
        </div>
        <div class="col-sm">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="LastName" placeholder="Efternavn">
                <label for="floatingInput">Efternavn</label>
            </div>
        </div>
    </div>
    <br>

    <!-- Række 2 -->
    <div class="row">
        <div class="col-sm">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="Email" placeholder="E-mailadresse">
                <label for="floatingInput">E-mailadresse</label>
            </div>
        </div>
        <div class="col-sm">
            <div class="form-floating mb-3">
                <input type="tel" class="form-control" id="floatingInput" name="Phone" placeholder="Telefonnummer">
                <label for="floatingInput">Telefonnummer</label>
            </div>
        </div>
    </div>
    <br>

    <!-- Række 3 -->
    <div class="row">
        <div class="col-sm">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="License" placeholder="Kørekortnummer">
                <label for="floatingInput">Kørekortnummer</label>
            </div>
        </div>
        <div class="col-sm">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="CustomerAddress" placeholder="Adresse">
                <label for="floatingInput">Adresse</label>
            </div>
        </div>
    </div>
    <br>

    <!-- Række 4 -->
    <div class="row">
        <div class="col-sm">
            
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="By" name="CityID">
                    <option selected>Vælg fra listen</option>
                    <?php
                        while( $row = sqlsrv_fetch_array($stmt_by, SQLSRV_FETCH_ASSOC) ) {
                            echo'<option value="'.$row["CityID"].'">'.$row["City"].'</option>';
                        }
                    ?>
                </select>
                <label for="floatingSelect">By</label>
            </div>

        </div>
        <div class="col-sm">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="PostalCode" placeholder="Postnummer">
                <label for="floatingInput">Postnummer</label>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-3">Fortsæt</button>

</form>