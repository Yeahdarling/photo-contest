<?php 
    require_once('connect.php');
    if (isset($_POST['submit'])) {
        $check_sql = " SELECT * FROM members WHERE username = '".$conn->real_escape_string($_POST['username'])."' ";     
        $check_user = $conn->query($check_sql);
        

        if (!$check_user->num_rows) {
            $hashed = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
            $date = date('Y-m-d H:i:s');
            $imgDefault = 'avatar.png';
            $sql = " INSERT INTO `members` (`name`, `email`, `mem_img`, `username`, `password`, `points`, `created_at`) 
                    VALUES ('".$conn->real_escape_string($_POST['name'])."', 
                            '".$conn->real_escape_string($_POST['email'])."',
                            '".$conn->real_escape_string($imgDefault)."',  
                            '".$conn->real_escape_string($_POST['username'])."', 
                            '".$conn->real_escape_string($hashed)."', 
                            '".$conn->real_escape_string(3)."',
                            '".$conn->real_escape_string($date)."') ";
            $result = $conn->query($sql) or die($conn->error);
            if ($result) {
                echo "<script> alert('สมัครสมาชิกสำเร็จ'); </script>";
                header('refresh:0; url=../index.php');
            } else {
                echo "<script> alert('สมัครสมาชิกไม่สำเร็จ \nติดต่อผู้ดูแล'); </script>";
                header('refresh:0; url=../index.php');
            }
        } else {
            echo "<script> alert('ชื่อผู้ใช้ซ้ำกัน กรุณากรอกชื่ออื่น'); </script>";
            header('refresh:0; url=../register.php');
        }
    } else {
        header('refresh:0; url=../register.php');
    }

?>