<?php 
    require_once('php/connect.php'); 
    $sql = " SELECT * FROM photo WHERE img_id = '".$_GET['img_id']."' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    $select = " SELECT * FROM members WHERE mem_id = '".$row['mem_id']."' "; 
    $answer = $conn->query($select);
    $line = $answer->fetch_assoc();

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
    <title>Detail</title>

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
            <h1 class="display-4 text-center">Photo</h1>
        </div>
    </div>

    <!-- content -->
    <article class="col-12">
        <div>
            <div class="text-center">
                <img class="rounded" src="assets/images/<?php echo $row['image']; ?>" alt="Card image cap">
            </div>
                <div class="text-center text-primary p-4">
                จำนวนโหวด ( 14 )
            </div>
            <div>
                <h5 class="card-title text-center p-3">ภาพจาก <?php echo $line['name']; ?></h5>
                <h4 class="text-center">ชื่อภาพ : <?php echo $row['img_name'] ?></h4>
                <h5 class="text-center card-text">เกี่ยวกับภาพ : <?php echo $row['description']; ?></h5>
            </div>
            <div class="text-center p-5">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-info float-left">Left</button>
                    <button type="button" class="btn btn-outline-info">Middle</button>
                    <button type="button" class="btn btn-info float-right">Vote</button>
                </div>
            </div>
        </div>
    </article>

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