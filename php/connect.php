<?php 
    session_start();
    $conn = new mysqli('localhost','root','','photo_contest');
    $conn->set_charset("utf8");
    if ($conn->connect_errno){
        die("Connection failed! ".$conn->connect_error);
    }
?>