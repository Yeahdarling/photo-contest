<nav id="navbar" class="navbar navbar-expand-sm navbar-cl navbar-light fixed-top">
    <a class="navbar-brand" href="index.php">
        <img src="assets/images/cam1.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Photo contest
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown ml-auto">
                <?php 
                    if (isset($_SESSION['name'])) {
                        ?>
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['name']; ?>
                            <img src="assets/images/<?php echo $_SESSION['mem_img'] ?>" class="rounded-circle" width="30px" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile.php">ประวัติส่วนตัว</a>
                            <a class="dropdown-item" href="mypost.php">รูปของฉัน</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="php/logout.php">ออกจากระบบ</a>
                        </div>
            </li>
                <?php
                    } else {
                ?>
                        <li class="nav-item ml-auto">
                            <a class="btn btn-success px-4 m-sm-1 mt-1" href="login.php">เข้าสู่ระบบ</a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="btn btn-info px-3 m-sm-1 mt-1" href="register.php">สมัครสมาชิก</a>
                        </li>
                    <?php
                    }
                    ?>
        </ul>
    </div>
</nav>