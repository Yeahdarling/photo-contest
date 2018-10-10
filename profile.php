<?php 
    require_once('php/connect.php');
    if (!isset($_SESSION['mem_id'])) {
        header('location:login.php');
        exit;
    }

    $sql = "SELECT * FROM `members` WHERE `mem_id` = '".$_SESSION['mem_id']."' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(!$result->num_rows) {
        header('location:index.php');
        exit;
    }
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
    <title>Register</title>

    <style>
        html > * {
            font-family: 'Mitr', sans-serif;
        }
    </style>

</head>
<body>
    <!-- navbar -->
    <?php include_once('includes/navbar.php'); ?>

    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid text-center">
        <div class="container pt-5">
            <h1>ประวัติส่วนตัว</h1>
        </div>
    </section>
    
    <!-- profile -->
    <section class="container my-5">
        <div class="row">
            <div class="col-12 profile-top">
                <img src="assets/images/<?php echo $row['mem_img']; ?>" class="img-profile rounded-circle img-thumbnail" alt="Profile Image">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="username">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control" id="username" value="<?php echo $row['username'];?>" disabled>
                            </div>
                            <div class="form-group col-12">
                                <label for="name">ชื่อ - สกุล</label>
                                <input type="text" class="form-control" id="name" value="<?php echo $row['name'];?>" disabled>
                            </div>                       
                            <div class="form-group col-12">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" value="<?php echo $row['email'];?>" disabled>
                            </div>
                        </div>
                        <a href="profile-edit.php" class="mt-3 btn btn-warning float-right">แก้ใขข้อมูล</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include_once('includes/footer.php') ?>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>