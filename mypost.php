<?php 
    require_once('php/connect.php'); 
    if (!isset($_SESSION['mem_id'])) {
        header('location:login.php');
        exit;
    }
    
    $sql = " SELECT * FROM photo WHERE mem_id = '".$_SESSION['mem_id']."' ";
    $result = $conn->query($sql) or die($conn->error);
 

    

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
            <h1 class="display-4 text-center">My Post</h1>
        </div>
    </div>

    <!-- Post photo -->
    <div class="text-center">
        <a href="photo-add.php" class="btn btn-outline-primary">อัพโหลดภาพ</a>
    </div>


    <!-- content -->
    <section class="container shadow p-3 mb-5 bg-white rounded">
        <div class="row">
            <?php 
                if ($result->num_rows) {
                    while ($row = $result->fetch_assoc()) {
            ?>
            <article class="col-12 col-sm-6 col-md-4 p-2">
                <div class="card h-100">
                    <a href="detail.php?img_id=<?php echo $row['img_id'] ?>" class="card-animate">
                        <img class="card-img-top" src="assets/images/<?php echo $row['image'] ?>" alt="Card image cap">
                    </a>
                    <div class="text-center text-primary pt-1">
                        จำนวนโหวด ( 14 )
                    </div>
                    <div class="card-body margin-t">
                        <h5 class="card-title">ชื่อภาพ : <?php echo $row['img_name']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
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