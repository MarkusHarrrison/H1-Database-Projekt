<?php include "config.php"; ?>

<?php
    // Tjekker om der er valgt en bil at leje
    // Hvis ikke, skal der redirectes til forsiden
    if(!isset($_GET['bil'])) {
        header('Location: /biludlejning');
    }
?>

<?php include 'template-parts/header-hero.php'; ?>

<div class="hero-content">
    <div class="container">
        <div class="form-wrapper bg-white w-50 mx-auto p-5 rounded shadow">
            <div class="text-center">
                <img src="assets/cars/<?php echo $_GET['bil']; ?>.png" class="order-image">
            </div>
            <?php include 'components/already-customer.php' ?>
            <?php include 'components/create-customer.php'; ?>
        </div>
    </div>
</div>

<?php include "template-parts/footer.php"; ?>