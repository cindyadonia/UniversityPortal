<?php
    include('config.php');
    
    if(isset($_POST['submit']))
    {
        $pw = $_POST['password'];
        $id = $_POST['username'];
        $update ="UPDATE tb_users set password='$pw' where username='$id'";
        $exec = mysqli_query($con,$update);
        header('Location: ../pages/dashboard.php');
    }
?>
