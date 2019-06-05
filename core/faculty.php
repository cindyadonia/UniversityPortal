<?php
    function checkFaculty()
    {
        global $con;
        $code = $_POST['facultycode'];
        $select = "SELECT faculty_code FROM tb_faculty where faculty_code='$code'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return false;
        }
        return true;
    }

    function getFaculty($id)
    {
        global $con;
        $select = "SELECT * FROM tb_faculty where id='$id'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return $check->fetch_assoc();
        }
        return false;
    }
    
    if(isset($_POST['addFaculty'])){

        global $con;
        $code = $_POST['facultycode'];
        $faculty = $_POST['faculty'];
        $sql = "INSERT INTO tb_faculty (faculty_code,faculty_name) VALUES ('$code','$faculty')";
        
        if(checkFaculty() == TRUE)
        {
            $exec = mysqli_query($con,$sql);
            if($exec == TRUE){
                $url = "/pages/dashboard.php?page=L_Faculty";
                $link = $baseUrl . $url;
                echo '<script> window.location.replace("'. $link .'");</script>';
                return true;
            }
            else{
                echo "<div class='alert alert-danger text-center'> Duplicate Faculty Code Detected. Please use another code</div>";                
            }
        }
        else
        {
            echo "<div class='alert alert-danger text-center'> Duplicate Faculty Code Detected. Please use another code. </div>";
        }
    }
    
    if(isset($_POST['updateFaculty'])){
        global $con;
        $id = $_POST['id'];
        $faculty = $_POST['faculty'];       
        $update = "UPDATE tb_faculty set faculty_name='$faculty' where id='$id'";
        $exec = mysqli_query($con,$update);
        if($exec == TRUE){
            $url = "/pages/dashboard.php?page=L_Faculty";
            $link = $baseUrl . $url;
            echo '<script> window.location.replace("'. $link .'");</script>';
            return true;
        }
        else{
            echo "<div class='alert alert-danger text-center'> Duplicate Faculty Code Detected. Please use another code. </div>";
        }
    }




?>