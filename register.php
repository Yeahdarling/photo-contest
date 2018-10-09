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
    <!-- Navbar -->
    <?php include_once('includes/navbar.php'); ?>

    <!-- form -->
    <div class="container p-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card">
                    <h5 class="card-header text-center">สมัครสมาชิก</h5>
                    <div class="card-body">
                        <form class="form" id="formRegister" method="POST" action="php/createMember.php">
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ - นามสกุล">
                            </div>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-at"></i></div>
                                </div>
                                <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com">
                            </div>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพ">
                            </div>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                            </div>
                            <div class="input-group mb-2 mr-sm-2">
                                <button name="submit" type="submit" id="submit" class="btn btn-primary btn-block mb-2">สมัครสมาชิก</button>
                            </div>
                            <div>
                                <span class="float-right">เข้าสู่ระบบ <a href="login.php">คลิกที่นี่</a></span>
                            </div>
                        </form>

                        <!-- <form class="form" id="facebookLogin" method="POST" action="php/facebooklogin.php">
                            <input name="name" id="facebook_name" type="text">
                            <input name="facebook_id" id="facebook_id" type="text" >
                        </form> -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">facebook login</div>



    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
    <script>
        //formRegister
        $( document ).ready(function(){
            $('#formRegister').validate({
                rules:{
                    name: 'required',
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        number: true,
                        maxlength: 20
                    },
                    username: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 4
                    },
                    confirm_password: {
                        required: true,
                        minlength: 4,
                        equalTo: '#password'
                    }
                },
                messages:{
                    name: 'โปรดกรอกข้อมูล ชื่อ - นามสกุล',
                    email: {
                        required: 'โปรดกรอกข้อมูล email',
                        email: 'โปรดกรอก email ให้ถูกต้อง'
                    },
                    phone: {
                        required: 'โปรดกรอกข้อมูล เบอร์โทรศัพท์',
                        number: 'โปรดกรอกตัวเลขเท่านั้น',
                        maxlength: 20
                    },
                    username: {
                        required: 'โปรดกรอกข้อมูล ชื่อผู้ใช้',
                        minlength: 'โปรดกรอกข้อมูลไม่น้อยกว่า 4 ตัวอักษร'
                    },
                    password: {
                        required: 'โปรดกรอกรหัสผ่าน',
                        minlength: 'โปรดกรอกข้อมูลไม่น้อยกว่า 4 ตัวอักษร'
                    },
                    confirm_password: {
                        required: 'โปรดกรอกรหัสผ่าน',
                        minlength: 'โปรดกรอกข้อมูลไม่น้อยกว่า 4 ตัวอักษร',
                        equalTo: 'โปรดกรอกข้อมูลให้ตรงกัน'
                    }
                },
                errorElement: 'div',
                errorPlacement: function ( error, element ){
                    error.addClass( 'invalid-feedback')
                    error.insertAfter( element )
                },
                hightlight: function ( element, errorClass, validClass ){
                    $( element ).addClass('is-invalid').removeClass('is-valid')
                },
                unlightlight: function ( element, errorClass, validClass ){
                    $( element ).addClass('is-valid').removeClass('is-invalid')
                }
            });
        })

        function recaptchaCallback(){
            $('#submit').removeAttr('disabled');
        }
    </script>
</body>
</html>