<?php 
    include'config.php';

    session_start();
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("Location: ../index.php");
            exit;
        }
    $user_id = $_SESSION['user_id'];
    $yg_login = $_SESSION['name'];
    $role = $_SESSION['role'];
    $gender = $_SESSION['gender'];
    $username = $_SESSION['username'];
    if($role == '2')
    {
        $semester = $_SESSION['semester'];
    }

 ?>