<?php
$bil_id = $_GET['bil'];
?>

<form action="create-rent-exsisting?bil=<?php echo $bil_id; ?>" method="POST">

    <!-- Række 1 -->
    <div class="row">
        <p class="text-black-50 fs-5 fw-semibold">Er du eksisterende kunde?</p>
        <div class="col-sm">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="exsisting_email" placeholder="E-mailadresse">
                <label for="floatingInput">E-mailadresse</label>
            </div>
        </div>
        <div class="col-sm">
            <button type="submit" class="btn btn-primary w-100 py-3">Hent kundeoplysninger</button>
        </div>
    </div>

</form>

<hr>