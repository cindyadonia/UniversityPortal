<?php
    function checkSemesterCode()
    {
        global $con;
        $code = $_POST['semestercode'];
        $select = "SELECT semester_code FROM tb_semester where semester_code='$code'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return false;
        }
        return true;
    }

    function getSemester($id)
    {
        global $con;
        $select = "SELECT * FROM tb_semester where id='$id'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return $check->fetch_assoc();
        }
        return false;
    }
    

    if(isset($_POST['addSemester'])){
        global $con;
        $code = $_POST['semestercode'];
        $semester = $_POST['semester'];
        $sql = "INSERT INTO tb_semester (semester_code, semester) VALUES ('$code','$semester')";
        
        if(checkSemesterCode() == TRUE)
        {
            $exec = mysqli_query($con,$sql);
            if($exec == TRUE){
                $url = "/pages/dashboard.php?page=L_Semester";
                $link = $baseUrl . $url;
                var_dump($link);
                echo '<script> window.location.replace("'. $link .'");</script>';
                return true;
            }
            else{
                echo "<div class='alert alert-danger text-center'> Duplicate Semester Code Detected. Please use another code. </div>";
            }    
        }
        else
        {
            echo "<div class='alert alert-danger text-center'> Duplicate Semester Code Detected. Please use another code. </div>";
        }
    }
    if(isset($_POST['updateSemester'])){
        global $con;
        $id = $_POST['id'];
        $semester = $_POST['semester'];       
        $update = "UPDATE tb_semester set semester='$semester' where id='$id'";
        $exec = mysqli_query($con,$update);
        if($exec == TRUE){
            $url = "/pages/dashboard.php?page=L_Semester";
            $link = $baseUrl . $url;
            echo '<script> window.location.replace("'. $link .'");</script>';
            return true;
        }
        else{
            echo "<div class='alert alert-danger text-center'> Duplicate Semester Code Detected. Please use another code. </div>";
        }
    }



?>