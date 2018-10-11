<?php 
    require_once('connect.php');
    if (!isset($_SESSION['mem_id'])) {
        header('location:login.php');
        exit;
    }

    $sql = " DELETE FROM `photo` WHERE `photo`.`img_id` = '".$_GET['img_id']."' ";
    $result = $conn->query($sql);
    if ($result) {
        $update = " UPDATE `members` SET `page_num` = page_num - 1 
                    WHERE `members`.`mem_id` = '".$_SESSION['mem_id']."' ";
        $answer = $conn->query($update);
        
        if ($answer) {
            echo "<script> alert('ลบเสร็จสิ้น !!!?'); </script>";
            header('refresh:0; url=../mypost.php');
        } else {
            echo "<script> alert('ERROR UPDATE  ติดต่อ แอดมิน'); </script>";
            header('refresh:0; url=../mypost.php');
        }
    } else {
        echo "<script> alert('ERROR DELETE  ติดต่อ แอดมิน'); </script>";
        header('refresh:0; url=../mypost.php');
    }
?>