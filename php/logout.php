<?php 
    session_start();
    if (!isset($_SESSION['mem_id'])) {
        header('location:../index.php');
        exit;
    }
    unset($_SESSION['mem_id']);
    unset($_SESSION['name']);
    unset($_SESSION['mem_img']);
    unset($_SESSION['facebook_id']);
    
    header('location:../index.php');
?>