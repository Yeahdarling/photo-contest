<?php 
    require_once('php/connect.php'); 
    $sql = " SELECT * FROM photo WHERE img_id = '".$_GET['img_id']."' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    $select = " SELECT * FROM members WHERE mem_id = '".$row['mem_id']."' "; 
    $answer = $conn->query($select);
    $line = $answer->fetch_assoc();

?>
<?php 
    if (isset($_SESSION['mem_id'])) {
        $pull = " SELECT * FROM members WHERE mem_id = '".$_SESSION['mem_id']."' ";
        $res = $conn->query($pull);
        $point = $res->fetch_assoc();
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
            <!-- point -->
                <?php
                    if (isset($_SESSION['mem_id'])) {
                ?>
                        <h3 class="text-center text-success mt-3">คุณมี [ <?php echo $point['points'] ?> ] สิทธิ์ลงคะแนน</h3>
                <?php
                    }
                ?>
            <!-- /point -->
        </div>
    </div>

    <!-- content -->
    <article class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="text-center m-5">
                    <img class="rounded w-100" src="assets/images/<?php echo $row['image']; ?>" alt="Card image cap">
                </div>
                    <div class="text-center text-primary p-4">
                    ได้รับ ( <?php echo$row['vote'] ?> ) คะแนน
                </div>
                <div>
                    <h5 class="card-title text-center p-3">ภาพจาก <?php echo $line['name']; ?></h5>
                    <h4 class="text-center">ชื่อภาพ : <?php echo $row['img_name'] ?></h4>
                    <h5 class="text-center card-text">เกี่ยวกับภาพ : <?php echo $row['description']; ?></h5>
                </div>
                <!-- button -->
                    <?php 
                        if (isset($_SESSION['mem_id'])) {
                            if ($point['points'] <= 0) {
                    ?>
                            <button class="btn btn-danger d-block mx-auto my-5" disabled>คุณใช้คะแนนไปหมดแล้ว</button>
                    <?php
                            } else {
                                ?>
                            <div class="text-center p-3">
                                <a href="php/vote.php?img_id=<?php echo $row['img_id'] ?>" style="width: 200px;" class="btn btn-danger text-light">+1 <i class="fas fa-heart"></i></a>
                            </div>
                    <?php
                            }
                        } else {
                    ?>
                            <div class="text-center p-3">
                                <a href="php/vote.php?img_id=<?php echo $row['img_id'] ?>" style="width: 200px;" class="btn btn-danger text-light">+1 <i class="fas fa-heart"></i></a>
                            </div>
                    <?php
                        }
                    ?>
                <!-- /button -->
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