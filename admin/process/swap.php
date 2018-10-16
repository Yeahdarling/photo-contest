<?php 
    require_once('../../php/connect.php');
    if (!isset($_SESSION['admin_name'])) {
        header('refresh:0; url=../../index.php');
    }

    if (isset($_POST['img_id'])){
        $sql = " UPDATE `photo` SET status = '".$_POST['status']."'
                WHERE `img_id` = '".$_POST['img_id']."' ";
        $result = $conn->query($sql);
    }

    $sql1 = " SELECT * FROM `photo` WHERE img_id = '".$_POST['img_id']."' ";
    $result2 = $conn->query($sql1);
    $row = $result2->fetch_assoc();
    
    $json = json_encode([
        'status' => $row['status']
    ]);

    header('Content-Type: application/json');
    echo $json;

?>