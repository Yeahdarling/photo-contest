<?php 
    require_once('php/connect.php');
    $sql = "SELECT COUNT(*) AS total FROM photo";
    $result = mysqli_query($conn,$sql);    
    $row = mysqli_fetch_assoc($result);

    $total_rows = $row['total'];

    $per_page = 3; //per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $total_page = ceil($total_rows / $per_page);

    if ($page > $total_page || $page < 1) {
        header('Location: index.php');
        exit;
    }

    $prev_page = $page-1;
    $next_page = $page+1;
    $row_start = ($page - 1) * $per_page;

    $sql = "SELECT * FROM photo ORDER BY img_id ASC LIMIT $row_start , $per_page ";
    $result = mysqli_query($conn, $sql);
    $num_row = mysqli_num_rows($result);



?>
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
    <title>Photo Contest</title>

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

    <!-- ส่งประกวด -->
    <div class="text-center">
        <a href="mypost.php" class="btn btn-outline-primary">ส่งภาพเข้าประกวด</a>
    </div>

    <!-- content -->
    <section class="container shadow p-3 mb-5 bg-white rounded">
        <div class="row">
            <?php 
                if ($num_row > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <article class="col-12 col-sm-6 col-md-4 p-2">
                <div class="card h-100">
                    <a href="#" class="card-animate">
                        <img class="card-img-top" src="assets/images/<?php echo $row['image'] ?>" alt="Card image cap">
                    </a>
                    <div class="text-center text-primary pt-1">
                        จำนวนโหวด ( 14 )
                    </div>
                    <div class="card-body margin-t">
                        <h5 class="card-title">ภาพจาก : <?php echo $row['name'] ?></h5>
                        <p class="card-text"><?php echo $row['description'] ?></p>
                    </div>
                    <div class="card-footer">
                            <button type="button" class="btn btn-info ">Left</button>
                            <button type="button" class="btn btn-info float-right">Vote</button>
                    </div>
                </div>
            </article>
            <?php
                    }
                } else {
                    echo 'No Data';
                }
            ?>
        </div>
    </section>

    <div class="text-center">
        <?php
            if ($total_page > 1) {
                for($i = 1; $i<=$total_page; $i++) {
        ?>
        <a href="index.php?page=<?php echo $i;?>"> 
                <span class="mb-3 btn btn-outline-primary"><?php echo $i; ?></span></li>
        </a>
        <?php
                }
            }
        ?>
    </div>

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