<?php include "config.php"; ?>

<!doctype html>
<html lang="da">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Database opgave | Markus Harrison</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet"/>
    </head>
    <body>

        <div class="d-flex">

            <!-- Sidebar -->
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img src="assets/logo.svg" height="30px">
                </a>
                <hr>
                
                <!-- Tab navs -->
                <div class="nav flex-column nav-tabs text-center" id="v-tabs-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-tabs-kunder-tab" data-mdb-toggle="tab" href="#v-tabs-kunder" role="tab" aria-controls="v-tabs-kunder" aria-selected="true">Kunder</a>
                    <a class="nav-link" id="v-tabs-biler-tab" data-mdb-toggle="tab" href="#v-tabs-biler" role="tab" aria-controls="v-tabs-biler" aria-selected="true">Biler</a>
                    <a class="nav-link" id="v-tabs-udlejninger-tab" data-mdb-toggle="tab" href="#v-tabs-udlejninger" role="tab" aria-controls="v-tabs-udlejninger" aria-selected="true">Udlejninger</a>
                    <a class="nav-link" id="v-tabs-indstillinger-tab" data-mdb-toggle="tab" href="#v-tabs-indstillinger" role="tab" aria-controls="v-tabs-indstillinger" aria-selected="true">Indstillinger</a>
                </div>
                <!-- Tab navs -->

                <hr>
                <a href="index.php" class="btn btn-primary w-100">Log ud</a>
            </div>
            <!-- Sidebar -->

            <!-- Medarbejder content -->
            <div class="medarbejder-content py-5 w-100">
                <div class="container">

                    <!-- Tab content -->
                    <div class="tab-content" id="v-tabs-tabContent">
                        <div class="tab-pane fade show active" id="v-tabs-kunder" role="tabpanel" aria-labelledby="v-tabs-kunder-tab">
                            <?php include 'components/medarbejder-kunder.php'; ?>
                        </div>
                        <div class="tab-pane fade" id="v-tabs-biler" role="tabpanel" aria-labelledby="v-tabs-biler-tab">
                            <?php include 'components/medarbejder-biler.php'; ?>
                        </div>
                        <div class="tab-pane fade" id="v-tabs-udlejninger" role="tabpanel" aria-labelledby="v-tabs-udlejninger-tab">
                            <?php include 'components/medarbejder-udlejninger.php'; ?>
                        </div>
                        <div class="tab-pane fade" id="v-tabs-indstillinger" role="tabpanel" aria-labelledby="v-tabs-indstillinger-tab">
                            <?php include 'components/medarbejder-indstillinger.php'; ?>
                        </div>
                    </div>
                    <!-- Tab content -->

                </div>
            </div>
            <!-- Medarbejder content -->

        </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
        <?php include "template-parts/footer.php"; ?>