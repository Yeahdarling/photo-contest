<?php 
    require_once('../../php/connect.php');
    if (!isset($_SESSION['admin_name'])) {
        header('refresh:0; url=../../index.php');
    }
    if (isset($_GET['img_id'])) {
        $sql = " DELETE FROM `photo` WHERE `photo`.`img_id` = '".$_POST['img_id']."' ";
        $result = $conn->query($sql) or die($conn->error);
        if ($result) {
            echo '<script> alert("Deleted !!?") </script>';
            header('refresh:0; url=../index.php');
        }
    }

?>