<?php 
    require_once('php/connect.php'); 
    if (!isset($_SESSION['mem_id'])) {
        header('location:login.php');
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

    <!-- content -->
    <section class="container my-3">
        <div class="row">
            <div class="col-12">
                <form class="form" id="formAdd" method="POST" action="php/add-photo.php" enctype="multipart/form-data">
                    <div class="form-row">

                        <!-- img -->
                        <div class="form-group col-12">
                            <div id="imgs" class="custom-file">
                                <input type="file" class="custom-file-input mt-2" name="file" id="customFile">
                                <label class="custom-file-label" for="customFile">เลือกรูปภาพ</label>
                            </div>
                            <figure class="figure text-center d-none mt-2">
                                <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                            </figure>
                        </div>
                        <article id="image" class="form-group col-12">
                            <img src="assets/images/cam1.png" class="d-block mx-auto img-profile rounded img-thumbnail" alt="">
                        </article>
                        <!-- img -->

                        <div class="form-group col-12">
                            <label for="img_name">ชื่อภาพ</label>
                            <input type="text" class="form-control" name="img_name" id="img_name">
                        </div>
                        <div class="form-group col-12">
                            <label for="description">เกี่ยวกับภาพ</label>
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                        <a href="mypost.php" class="d-block mt-3 btn btn-warning float-left">ย้อนกลับ</a>
                        <input name="submit" type="submit" id="submit" class="d-block mt-3 btn btn-primary ml-auto" value="อัพโหลด">
                    </div>
                </form>
            </div>
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
    <script>
        // remove article
        $('#imgs').click(function() {
            $("article").remove();
        });

        // อัพโหลดภาพ
        $('.custom-file-input').on('change', function(){
            var fileName = $(this).val().split('\\').pop()
            $(this).siblings('.custom-file-label').html(fileName)
            if (this.files[0]) {
                var reader = new FileReader()
                $('.figure').addClass('d-block')
                reader.onload = function (e) {
                    $('#imgUpload').attr('src', e.target.result)
                }
                reader.readAsDataURL(this.files[0])
            }
        })
    </script>

</body>
</html>