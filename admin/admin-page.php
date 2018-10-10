<?php 
    // if (!$_SESSION['admin_name']) {
    //     header('refresh:0; url=admin-login.php');
    // }
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
        <a class="navbar-brand" href="#">
            <img src="../assets/images/cam1.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Photo contest
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ml-auto">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        name
                        <img src="https://image.flaticon.com/icons/svg/167/167750.svg" class="rounded-circle" width="30px" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">ประวัติส่วนตัว</a>
                        <a class="dropdown-item" href="mypost.php">รูปของฉัน</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">ออกจากระบบ</a>
                    </div>
                </li>
                <li class="nav-item ml-auto">
                    <a class="btn btn-success px-4 m-sm-1 mt-1" href="login.php">เข้าสู่ระบบ</a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="btn btn-info px-3 m-sm-1 mt-1" href="register.php">สมัครสมาชิก</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container pt-5">
            <h1 class="display-4 text-center">Photo List</h1>
        </div>
    </div>

    <!-- content -->
    <table id="dataTable" class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Description</th>
                <th>Vote</th>
                <th>Status</th>
                <th>Mem_id</th>
                <th>Post_at</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php for($id=1; $id <= 5; $id++) { ?>
            <tr>
                <td class="text-center"><?php echo $id; ?></td>
                <td><img class="img-fluid d-block mx-auto" src="https://images.unsplash.com/photo-1531026383433-6ed5a112afbc?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=c010c700aac502636ad0b579ce1274a4&auto=format&fit=crop&w=1350&q=80" width="150px" alt=""></td>
                <td>Photo Name<?php echo $id; ?></td>
                <td>detail lorem ................<?php echo $id; ?></td>
                <td class="text-center">10</td>
                <th class="text-center">OK</th>
                <th class="text-center">1</th>
                <th class="text-center">date</th>
                <td class="text-center">
                    <a href="admin-page.php?mem_id=<?php echo $id; ?>" class="btn btn-sm btn-warning text-white">
                        <i class="fas fa-edit"></i> Edit
                    </a> 
                </td>
                <td class="text-center">
                    <a href="#" onclick="deleteItem(<?php echo $id; ?>);" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash-alt"></i> Delete
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

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