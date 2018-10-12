<?php 
    require_once('../php/connect.php');
    if (!isset($_SESSION['admin_name'])) {
        echo '<script> alert(" Isset ??") </script>';
        header('refresh:0; url=admin-login.php');
        exit;
    }

    $sql = " SELECT * FROM `photo` WHERE `img_id` = '".$_GET['img_id']."' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="../assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- favicon -->
    <link rel="stylesheet" href="../node_modules/font-awesome5/css/fontawesome-all.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <title>admin system</title>

    <style>
        html > * {
            font-family: 'Mitr', sans-serif;
        }
    </style>

</head>
<body>
    <!-- Navbar -->
    <nav id="navbar" class="navbar navbar-expand-sm navbar-cl navbar-light fixed-top">
        <a class="navbar-brand" href="../index.php">
            <img src="../assets/images/cam1.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Photo contest
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php  
                    if (isset($_SESSION['admin_name'])) {
                ?>
                        <li class="nav-item dropdown ml-auto">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Welcome Admin
                                <img src="../assets/images/mib.jpg" class="rounded-circle" width="30px" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="process/logout.php">Log out</a>
                            </div>
                        </li>
                <?php
                    } else {
                ?>
                        <li class="nav-item ml-auto">
                            <a class="btn btn-success px-4 m-sm-1 mt-1" href="#">Admin System</a>
                        </li>
                <?php
                    }
                ?>
                
                
            </ul>
        </div>
    </nav>

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container pt-5">
            <h1 class="display-4 text-center">Admin Edit</h1>
        </div>
    </div>

    <!-- admin edit -->
    <section class="container">
        <div class="row">
            <form class="col-12" method="POST" action="process/edit-admin.php">
                <div class="form-row my-5">
                    <h3 class="text-center">
                        img_id : <?=$row['img_id'] ?>
                    </h3>
                <!-- img -->
                    <div class="mx-auto my-3">
                        <img class="w-100 rounded" src="../assets/images/<?=$row['image']; ?>">
                    </div>
                <!-- /img -->
                    <div class="form-group col-12">
                        <label for="img_name">ชื่อภาพ</label>
                        <input type="text" class="form-control" name="img_name" id="img_name" value="<?=$row['img_name'] ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="description">เกี่ยวกับภาพ</label>
                        <input type="text" class="form-control" name="description" id="description" value="<?=$row['description'] ?>">
                    </div>
                        <input type="hidden" class="form-control" name="img_id" id="img_id" value="<?=$row['img_id'] ?>">
                    <a href="admin-page.php" class="d-block mt-3 btn btn-warning float-left">ย้อนกลับ</a>
                    <input name="submit" type="submit" id="submit" class="d-block mt-3 btn btn-primary ml-auto" value="บันทึก">
                </div>
            </form>
        </div>
    </section>


    <!-- Section on to top -->
    <div class="to-top">
        <i class="fas fa-angle-up"></i>    
    </div>

    <!-- footer -->
    <?php include_once('../includes/footer.php'); ?>
    

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>

</body>
</html>