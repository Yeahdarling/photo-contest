<?php
    require_once('../php/connect.php');
    if (!isset($_SESSION['admin_name'])) {
        echo '<script> alert(" Isset ??") </script>';
        header('refresh:0; url=admin-login.php');
        exit;
    }

    $sql = "SELECT * FROM photo";
    $result = mysqli_query($conn, $sql);

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
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
                                <a class="dropdown-item" href="admin-page.php">photo</a>
                                <a class="dropdown-item" href="admin-user.php">user</a>
                                <div class="dropdown-divider"></div>
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
            <h1 class="display-4 text-center">Photo List</h1>
        </div>
    </div>

    <!-- content -->
    <section>
        <a href="exportxls.php" class="btn btn-success my-3"><i class="fas fa-cloud-download-alt"></i> Excel</a>
        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Vote</th>
                    <th>Status</th>
                    <th>Owner ( id : name )</th>
                    <th>Post_at</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                <tr>
                    <td class="text-center"><?=$row['img_id']; ?></td>
                    <td><img class="img-fluid d-block mx-auto" src="../assets/images/<?=$row['image']; ?>" width="150px" alt=""></td>
                    <td><?=$row['img_name']; ?></td>
                    <td><?=$row['description']; ?></td>
                    <td class="text-center"><?=$row['vote']; ?></td>
                    <td class="text-center">
                        <button class="btn make" id="<?php echo $row['img_id'] ?>" data-img_id="<?php echo $row['img_id'] ?>" data-status="<?php echo $row['status'] ?>">
                            <i class="fas fa-check fa-2x text-success <?php echo $row['status'] ? 'd-block': 'd-none' ?>"></i>
                            <i class="fas fa-2x fa-times text-danger <?php echo $row['status'] ? 'd-none': 'd-block' ?>"></i>
                        </button>
                    </td>
                    <td><?=$row['mem_id']; ?> : <?=$row['name']; ?></td>
                    <td class="text-center"><?=$row['posted_at']; ?></td>
                </tr>
            <?php
                    }
                
            ?>
            </tbody>
            <tfoot>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Vote</th>
                    <th>Status</th>
                    <th>Owner ( id : name )</th>
                    <th>Post_at</th>
                </tr>
            </tfoot>
        </table>
    </section>
    <br>


    <!-- Section on to top -->
    <div class="to-top">
        <i class="fas fa-angle-up"></i>    
    </div>

    <!-- footer -->
    <?php include_once('../includes/footer.php'); ?>
    

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );

    </script>

    <script>

        $(".make").click(function(event) {
            var img_id = $(this).data('img_id'),
                status = $(this).data('status') ? 0 : 1  ,
                check = '#' + $(this).data('img_id') +' '+ '.fa-check', 
                times = '#' + $(this).data('img_id') +' '+ '.fa-times',
                id = '#' + $(this).data('img_id')

            $.ajax({
                url: "process/swap.php",
                data: {img_id: img_id, status: status},
                type: "POST",
                dataType: "json"
            }).done(function(result) {
                $(id).data('status', status);
                if(parseInt(result.status)) {
                    $(check).addClass('d-block')
                    $(check).removeClass('d-none')
                    $(times).addClass('d-none')
                    $(times).removeClass('d-block')
                } else {    
                    $(check).addClass('d-none')
                    $(check).removeClass('d-block')
                    $(times).addClass('d-block')
                    $(times).removeClass('d-none')
                }
            });
        });
</script>
</body>
</html>