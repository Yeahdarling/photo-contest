<?php 
    require_once('../../php/connect.php');
    if (!isset($_SESSION['admin_name'])) {
        header('refresh:0; url=../admin-login.php');
        exit;
    }
    if (isset($_POST['submit'])) {
        $sql = " UPDATE photo SET 
                img_name = '".$_POST['img_name']."',
                description = '".$_POST['description']."'
                WHERE img_id = '".$_POST['img_id']."' ";
        $result = $conn->query($sql) or die($sql->error);
        if ($result) {
            echo '<script> alert(" Edit finished !!?") </script>';
            header('refresh:0; url=../index.php');
        }
    } else {
        header('refresh:0; url=../index.php');
    }

?>