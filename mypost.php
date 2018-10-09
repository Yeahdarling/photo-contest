<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- favicon -->
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <title>My Post</title>

    <style>
        html > * {
            font-family: 'Mitr', sans-serif;
        }
    </style>

</head>
<body>
    <!-- Navbar -->
    <?php include_once('includes/navbar.php'); ?>

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container pt-5">
            <h1 class="display-4 text-center">Photo Contest</h1>
        </div>
    </div>

    <!-- content -->
    <section class="container shadow p-3 mb-5 bg-white rounded">
        <div class="row">
            <article class="col-12 col-sm-6 col-md-4 p-2">
                <div class="card h-100">
                    <a href="detail.php" class="card-animate">
                        <img class="card-img-top" src="assets/images/logo.jpg" alt="Card image cap">
                    </a>
                    <div class="text-center text-primary pt-1">
                        จำนวนโหวด ( 14 )
                    </div>
                    <div class="card-body margin-t">
                        <h5 class="card-title">ชื่อผู้โพส</h5>
                        <p class="card-text">บอกให้เรารู้สักนิดเกี่ยวกับรูปภาพนี้ บอกให้เรารู้สักนิดเกี่ยวกับรูปภาพนี้ บอกให้เรารู้สักนิดเกี่ยวกับรูปภาพนี้</p>
                    </div>
                    <div class="card-footer text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-info float-left">Left</button>
                            <button type="button" class="btn btn-outline-info">Middle</button>
                            <button type="button" class="btn btn-info float-right">Vote</button>
                        </div>
                    </div>
                </div>
            </article>
            <article class="col-12 col-sm-6 col-md-4 p-2">
                <div class="card h-100">
                    <a href="#" class="card-animate">
                        <img class="card-img-top" src="assets/images/carousel1.jpg" alt="Card image cap">
                    </a>
                    <div class="text-center text-primary pt-1">
                        จำนวนโหวด ( 14 )
                    </div>
                    <div class="card-body margin-t">
                        <h5 class="card-title">ชื่อผู้โพส</h5>
                        <p class="card-text">บอกให้เรารู้สักนิดเกี่ยวกับรูปภาพนี้</p>
                    </div>
                    <div class="card-footer text-center">
                        <div class="btn-group d-block" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-info float-left">Left</button>
                            <button type="button" class="btn btn-outline-info">Middle</button>
                            <button type="button" class="btn btn-info float-right">Vote</button>
                        </div>
                    </div>
                </div>
            </article>
            <article class="col-12 col-sm-6 col-md-4 p-2">
                <div class="card h-100">
                    <a href="#" class="card-animate">
                        <img class="card-img-top" src="assets/images/carousel2.jpg" alt="Card image cap">
                    </a>
                    <div class="text-center text-primary pt-1">
                        จำนวนโหวด ( 14 )
                    </div>
                    <div class="card-body margin-t">
                        <h5 class="card-title">ชื่อผู้โพส</h5>
                        <p class="card-text">บอกให้เรารู้สักนิดเกี่ยวกับรูปภาพนี้ บอกให้เรารู้สักนิดเกี่ยวกับรูปภาพนี้</p>
                    </div>
                    <div class="card-footer">
                            <button type="button" class="btn btn-info ">Left</button>
                            <button type="button" class="btn btn-info float-right">Vote</button>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <!-- Section on to top -->
    <div class="to-top">
        <i class="fas fa-angle-up"></i>    
    </div>

    <!-- footer -->
    <?php include_once('includes/footer.php'); ?>
    

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>