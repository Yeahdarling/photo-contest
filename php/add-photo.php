<?php 
    require_once('connect.php');
    if (!isset($_SESSION['mem_id'])) {
        header('refresh:0; url=../login.php');
        exit;
    }

    if (isset($_POST['submit'])) {
        $temp = explode('.', $_FILES['file']['name']);
        $new_name = round(microtime(true)*9999) . '.' . end($temp);
        $url = '../assets/images/'.$new_name;        
        if (move_uploaded_file($_FILES['file']['tmp_name'], $url )) {
            $date = date("Y-m-d H:i:s");
            $sql = " INSERT INTO `photo` (`image`, `img_name`, `description`, `mem_id`, `name`, `posted_at`) 
                    VALUES ('".$conn->real_escape_string($new_name)."', 
                            '".$conn->real_escape_string($_POST['img_name'])."', 
                            '".$conn->real_escape_string($_POST['description'])."', 
                            '".$conn->real_escape_string($_SESSION['mem_id'])."',
                            '".$conn->real_escape_string($_SESSION['name'])."',
                            '".$conn->real_escape_string($date)."') ";
            $result = $conn->query($sql) or die($conn->error);
            if ($result) {
                $update = " UPDATE `members` SET `page_num` = page_num + 1 
                            WHERE `members`.`mem_id` = '".$conn->real_escape_string($_SESSION['mem_id'])."' ";
                $finish = $conn->query($update) or die($conn->error);
                if ($finish) {
                    echo '<script> alert("อัพโหลดสำเร็จ"); </script>';
                    header('refresh:0; url=../mypost.php');
                } else {
                    echo '<script> alert("error Update"); </script>';
                    header('refresh:0; url=../mypost.php');
                }
            } else {
                echo '<script> alert("error INSERT"); </script>';
                header('refresh:0; url=../mypost.php');
            }
        } else {
            echo '<script> alert("error MOVE Image"); </script>';
            header('refresh:0; url=../mypost.php');
        }
    } else {
        echo '<script> alert(" no submit ") </script>';
        header('refresh:0; url=../index.php');
    }

   

    
?>