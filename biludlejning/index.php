<?php include "config.php"; ?>
<?php include "template-parts/header-hero.php"; ?>

<div class="hero-content">
    <div class="container">
        <span class="badge rounded-pill text-bg-primary text-black mb-3">Projekt af Markus</span>
        <h1 class="text-white danbury">Lej de absolute<br>bedste biler her!</h1>
    </div>
</div>

<div class="content bg-white">
    <div class="container">
        <h3 class="danbury text-center">Vores biler</h3>
        <p class="subheader text-center text-uppercase fw-semibold mb-5">Udforsk vores luksusbiler</p>
        <?php include 'components/cars.php' ?>
    </div>
</div>

<?php include "template-parts/footer.php"; ?>