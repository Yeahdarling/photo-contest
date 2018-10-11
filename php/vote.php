<?php 
    require_once('connect.php'); 
    if (!isset($_SESSION['mem_id'])) {
        echo '<script> alert(" กรุณา Login ก่อน "); </script>';
        header('location:../login.php');
        exit;
    }

    $sql = " UPDATE `photo` SET `vote` = vote + 1 
            WHERE `photo`.`img_id` = '".$_GET['img_id']."' ";
    $result = $conn->query($sql);
    if ($result) {
        $point = " UPDATE `members` SET `points` = points -1 
            WHERE `members`.`mem_id` = '".$_SESSION['mem_id']."' ";
        $succ = $conn->query($point);
        if ($succ) {
            header('refresh:0; url=../index.php');
        } else {
            echo '<script> alert(" ERROR -> UPDATE(members) "); </script>';
            header('../index.php');
        }
    } else {
        echo '<script> alert(" ERROR -> UPDATE(photo) "); </script>';
        header('../index.php');
    }
?>