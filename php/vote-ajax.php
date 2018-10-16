<?php 
    require_once('connect.php'); 
    if (!isset($_SESSION['mem_id'])) {
        echo '<script> alert(" กรุณา Login ก่อน "); </script>';
        header('location:../login.php');
        exit;
    }
    $pull1 = " SELECT * FROM members WHERE mem_id = '".$_SESSION['mem_id']."' ";
    $res1 = $conn->query($pull1);
    $point1 = $res1->fetch_assoc();
    if ($point1['points'] <= 0 ) {
        header('location:../login.php');
        exit;
    }


    $return = [
        'error' => 1,
        'message' => '',
        'point' => 0,
        'vote' => 0,
        'limit' => 0
    ];

    $sql = " UPDATE `photo` SET `vote` = vote + 1 
            WHERE `photo`.`img_id` = '".$_POST['img_id']."' ";
    $result = $conn->query($sql);
    if ($result) {
        $point = " UPDATE `members` SET `points` = points -1 
            WHERE `members`.`mem_id` = '".$_SESSION['mem_id']."' ";
        $succ = $conn->query($point);
        if ($succ) {
            $return['error'] = 0;
            //



        } else {
            $return['message'] = 'Update Error -> members';
        }
    } else {
        $return['message'] = 'Update Error -> photo';
    }


    $pull = " SELECT * FROM members WHERE mem_id = '".$_SESSION['mem_id']."' ";
    $res = $conn->query($pull);
    $point = $res->fetch_assoc();
    $return['point'] = $point['points'];

    $sql1 = " SELECT * FROM `photo` WHERE img_id = '".$_POST['img_id']."' ";
    $result2 = $conn->query($sql1);
    $row = $result2->fetch_assoc();
    $return['vote'] = $row['vote'];

$json = json_encode($return, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);


header('Content-Type: application/json');
echo $json;