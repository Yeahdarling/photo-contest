<?php 
    require_once('connect.php');


    $sqlCount = " SELECT COUNT(*) AS num FROM `members` WHERE facebook_id = '".$_POST['facebook_id']."' ";
    $resultCount = $conn->query($sqlCount);
    $rowCount = $resultCount->fetch_assoc();
    // print_r($rowCount['num']);
    // exit();
   
    if ($rowCount['num'] == 0) {
        
        if (isset($_POST['facebook_id'])) {
            $date = date("Y-m-d H:i:s");
            $sql = " INSERT INTO `members` (`name`, `mem_img`, `created_at`, `facebook_id`, `points`) 
                    VALUES ('".$_POST['name']."', 
                            'avatar.png', 
                            '".$date."', 
                            '".$_POST['facebook_id']."',
                            '".$conn->real_escape_string(3)."')  ";

            $result = $conn->query($sql);

            $sqlSelect = " SELECT * FROM members ";
            $resultSelect = $conn->query($sqlSelect);
            $rowSelect = $resultSelect->fetch_assoc();
            

            $_SESSION['facebook_id'] = $_POST['facebook_id'];
            $_SESSION['mem_id'] = $rowSelect['mem_id'];
            $_SESSION['name'] = $rowSelect['name'];
            $_SESSION['mem_img'] = $rowSelect['mem_img'];

            header("Refresh:1; url=../index.php");
        }
        
    } else {
        $sqlElse = " SELECT * FROM members WHERE facebook_id = '".$_POST['facebook_id']."'";
        $resultElse = $conn->query($sqlElse);
        $rowElse = $resultElse->fetch_assoc();
        
        $_SESSION['facebook_id'] = $_POST['facebook_id'];
        $_SESSION['mem_id'] = $rowElse['mem_id'];
        $_SESSION['name'] = $rowElse['name'];
        $_SESSION['mem_img'] = $rowElse['mem_img'];


        header("Refresh:0; url=../index.php");
    }
   

?>