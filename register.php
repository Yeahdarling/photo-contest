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
                        <form class="form" id="formRegister" method="POST" action="php/create-member.php">
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

    <!-- test facebook login -->
    <!-- <script>
        
        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            if (response.status === 'connected') {

            testAPI();
            } else {
            document.getElementById('status').innerHTML = 'Please log ' +
                'into this app.';
            }
        }

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
            console.log('1');

            });
            
        }

        window.fbAsyncInit = function() {
            FB.init({
                appId      : '857970784592124',
                cookie     : true,  // enable cookies to allow the server to access 
                                    // the session
                xfbml      : true,  // parse social plugins on this page
                version    : 'v3.1' // use graph api version 2.8
            });

    
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
                console.log('2');
                
            });

        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
            console.log('Successful login for: ' + response.name);
            console.log(response);
            document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';
            document.getElementById('facebook_id').value = response.id;
            document.getElementById('facebook_name').value = response.name;
            document.getElementById('facebookLogin').submit();
                
                
            });
        }
    </script>

    <div class="text-center p-3">
        <div class="fb-login-button" 
            data-onlogin="statusChangeCallback"
            data-max-rows="1" 
            data-size="large" 
            data-button-type="continue_with" 
            data-show-faces="false" 
            data-auto-logout-link="false" 
            data-use-continue-as="false">
        </div>
    </div>

    <div id="status">
    </div> -->

<!-- end -->



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
                    username: {
                        required: true,
                        minlength: 4,
                        maxlength: 12
                    },
                    password: {
                        required: true,
                        minlength: 4,
                        maxlength: 12
                    },
                    confirm_password: {
                        required: true,
                        minlength: 4,
                        maxlength: 12,
                        equalTo: '#password'
                    }
                },
                messages:{
                    name: 'โปรดกรอกข้อมูล ชื่อ - นามสกุล',
                    email: {
                        required: 'โปรดกรอกข้อมูล email',
                        email: 'โปรดกรอก email ให้ถูกต้อง'
                    },
                    username: {
                        required: 'โปรดกรอกข้อมูล ชื่อผู้ใช้',
                        minlength: 'โปรดกรอกข้อมูลไม่น้อยกว่า 4 ตัวอักษร',
                        maxlength: 'โปรดกรอกข้อมูลไม่เกิน 12 ตัวอักษร'
                    },
                    password: {
                        required: 'โปรดกรอกรหัสผ่าน',
                        minlength: 'โปรดกรอกข้อมูลไม่น้อยกว่า 4 ตัวอักษร',
                        maxlength: 'โปรดกรอกข้อมูลไม่เกิน 12 ตัวอักษร'
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