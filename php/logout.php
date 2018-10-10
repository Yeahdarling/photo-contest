<?php 
    session_start();
    if (!isset($_SESSION['mem_id'])) {
        header('location:../index.php');
        exit;
    }
    session_destroy();
    header('location:../index.php');
?>