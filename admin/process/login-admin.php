<?php
    require_once('../../php/connect.php');
    if (isset($_POST['submit'])) {
        $admin = $_POST['admin'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM admin WHERE admin_name = ?");
        $stmt->bind_param('s', $admin); // s - string , b - blob , i- int
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if (!empty($row)) {
            if($password == $row['password']) {
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['admin_name'] = $row['admin_name'];
                
                if (isset($_SESSION['admin_name'])) {
                    header('location:../index.php');
                }
            } else {
                echo '<script> alert("รหัสผ่านไม่ถูกต้อง")</script>';
                header('Refresh:0; url=../admin-login.php');
            }
        } else {
            echo '<script> alert("ผู้ใช้ไม่มีอยู่จริง")</script>';
            header('Refresh:0; url=../admin-login.php');
        }
    } else {
        header('location:../index.php');
    }

?>