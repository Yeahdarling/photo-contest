<?php 
    require_once('../php/connect.php');
    if (!isset($_SESSION['admin_name'])) {
        echo '<script> alert(" Isset ??") </script>';
        header('refresh:0; url=admin-login.php');
        exit;
    }

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
<?php 
    // $select = " SELECT * FROM members WHERE mem_id = '".$row['mem_id']."' ";
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
        <?php 
            if ($num_row > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
            <tr>
                <td class="text-center"><?=$row['img_id']; ?></td>
                <td><img class="img-fluid d-block mx-auto" src="../assets/images/<?=$row['image']; ?>" width="150px" alt=""></td>
                <td><?=$row['img_name']; ?></td>
                <td><?=$row['description']; ?></td>
                <td class="text-center"><?=$row['vote']; ?></td>
                <th class="text-center">
                    <?php 
                        if ($row['status']==0) {
                    ?>
                            <a href="process/downstat.php?img_id=<?=$row['img_id']; ?>"><i class="fas fa-check fa-2x text-success"></i></a>
                    <?php
                        } else {
                    ?>
                            <a href="process/upstat.php?img_id=<?=$row['img_id']; ?>"><i class="fas fa-2x fa-times text-danger"></i></a>
                    <?php
                        }
                    ?>
                </th>
                <th class="text-center"><?=$row['mem_id']; ?></th>
                <th class="text-center"><?=$row['posted_at']; ?></th>
                <td class="text-center">
                    <a href="admin-edit.php?img_id=<?=$row['img_id']; ?>" class="btn btn-sm btn-warning text-white">
                        <i class="fas fa-edit"></i> Edit
                    </a> 
                </td>
                <td class="text-center">
                    <a href="#" onclick="deleteItem(<?=$row['img_id']; ?>);" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash-alt"></i> Delete
                    </a>
                </td>
            </tr>
        <?php
                }
            } else {
                echo 'No Data';
            }
        ?>
        </tbody>
    </table>
    <!-- paging -->
    <div class="text-center">
        <?php
            if ($total_page > 1) {
                for($i = 1; $i<=$total_page; $i++) {
        ?>
        <a href="admin-page.php?page=<?php echo $i;?>"> 
                <span class="mb-3 btn btn-outline-primary <?=$page==$i?'active':''; ?> "><?php echo $i; ?></span></li>
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
    <?php include_once('../includes/footer.php'); ?>
    

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script>
        function deleteItem (id) { 
            if( confirm('Are you sure, you want to delete this item?') == true){
                window.location=`process/admin-delete.php?img_id=${id}`;
                // window.location='delete.php?id='+id;
                }
            };

    </script>
</body>
</html>