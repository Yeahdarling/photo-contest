<?php 
    require_once('../../php/connect.php');
    if (!isset($_SESSION['admin_name'])) {
        header('refresh:0; url=../../index.php');
    }

    if (isset($_GET['img_id'])){
        $sql = " UPDATE `photo` SET status = 1 
            WHERE `img_id` = '".$_GET['img_id']."' ";
        $result = $conn->query($sql);
        header('refresh:0; url=../admin-page.php');
    }
    

?>