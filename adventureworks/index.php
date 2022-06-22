<?php include "config.php"; ?>
<?php include "components/header.php"; ?>

<div class="container">
    <div class="alert alert-secondary" role="alert">
        Denne side er et eksempel på hvordan man kan hente sin data i sin database. Siden henter tilfældig data ved hver genindlæsning, for at vise at dataen er dynamisk.
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="bg-dark text-white p-3 shadow">
                <h4 class="mb-3">Kunder</h4>
                <?php include "components/customers.php"; ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="bg-dark text-white p-3 shadow">
                <h4 class="mb-3">Database tabeller</h4>
                <?php include "components/tables.php"; ?>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-4">
            <div class="bg-dark text-white p-3 shadow">
                <h4 class="mb-3">Produktkategorier</h4>
                <?php include "components/productcategories.php"; ?>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="bg-dark text-white p-3 shadow">
                <h4 class="mb-3">Produkter</h4>
                <?php include "components/products.php"; ?>
            </div>
        </div>
    </div>
</div>

<?php include "components/footer.php"; ?>