<?php 
    require_once('connect.php');
    if (!isset($_SESSION['mem_id'])) {
        header('location:../login.php');
        exit;
    }

    $return = [
        'error' => 1,
        'message' => ''
    ];

    if (isset($_POST['submit'])){
        // validate
        $name = $_POST['name'];
        if(strlen($name) <= 30) {
            $sql = "UPDATE `members` SET 
                    `name` = '".$conn->real_escape_string($_POST['name'])."',
                    `email` = '".$conn->real_escape_string($_POST['email'])."'
                    WHERE mem_id = '".$_SESSION['mem_id']."' ";
            $result = $conn->query($sql) or die($conn->error);

            if($result) {
                $_SESSION['name'] = $_POST['name'];

                $return['error'] = 0;
            } else {
                $return['message'] = 'can not update';
            }
        } else {
            $return['message'] = 'name length exceed 30 chars.';
        }

    }   else {
        $return['message'] = 'can not process';
    }

$json = json_encode($return, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);


header('Content-Type: application/json');
echo $json;