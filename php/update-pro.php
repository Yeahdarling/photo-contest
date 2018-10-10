<?php 
    require_once('connect.php');
    if (!isset($_SESSION['mem_id'])) {
        header('location:../login.php');
        exit;
    }

    if (isset($_POST['submit'])){
        $sql = "UPDATE `members` SET 
                `name` = '".$conn->real_escape_string($_POST['name'])."',
                `email` = '".$conn->real_escape_string($_POST['email'])."'
                WHERE mem_id = '".$_SESSION['mem_id']."' ";
        $result = $conn->query($sql) or die($conn->error);

        if($result) {
            $_SESSION['name'] = $_POST['name'];

            echo "<script> alert('แก้ใขข้อมูลสำเร็จ'); </script>";
            header('Refresh:0; url=../profile.php');
        } else {
            echo "แก้ใขข้อมูลไม่สำเร็จสำเร็จ \nให้ติดต่อผู้ดูแลระบบ";
            header('Refresh:3; url=../profile.php');
        }
    }   else {
        header('location:../index.php');
    }

?>