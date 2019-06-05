<?php
    require'config.php';
    
    function checkReligionCode()
    {
        global $con;
        $code = $_POST['religioncode'];
        $select = "SELECT religion_code FROM tb_religion where religion_code='$code'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return false;
        }
        return true;
    }

    function getReligion($id) {
        global $con;
        $select = "SELECT * FROM tb_religion where id='$id'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return $check->fetch_assoc();
        }
        return false;
    }

    function updateReligion($id){
        
    }

    if(isset($_POST['addReligion'])){
        global $con;
        $code = $_POST['religioncode'];
        $religion = $_POST['religion'];
        $sql = "INSERT INTO tb_religion (religion_code, religion) VALUES ('$code','$religion')";
        
        if(checkReligionCode() == TRUE)
        {
            $exec = mysqli_query($con,$sql);
            if($exec == TRUE){
                $url = "/pages/dashboard.php?page=L_Religion";
                $link = $baseUrl . $url;
                echo '<script> window.location.replace("'. $link .'");</script>';
                return true;
            }
            else{
                echo "<div class='alert alert-danger text-center'> Duplicate Religion Code Detected. Please use another code. </div>";
            }    
        }
        else
        {
            echo "<div class='alert alert-danger text-center'> Duplicate Religion Code Detected. Please use another code. </div>";
        }
    }
    if(isset($_POST['updateReligion'])){
        global $con;
        $id = $_POST['id'];
        $religion = $_POST['religion'];       
        $update = "UPDATE tb_religion set religion='$religion' where id='$id'";
        $exec = mysqli_query($con,$update);
        if($exec == TRUE){
            $url = "/pages/dashboard.php?page=L_Religion";
            $link = $baseUrl . $url;
            echo '<script> window.location.replace("'. $link .'");</script>';
            return true;
        }
        else{
            echo "<div class='alert alert-danger text-center'> Duplicate Religion Code Detected. Please use another code. </div>";
        }
    }



?>