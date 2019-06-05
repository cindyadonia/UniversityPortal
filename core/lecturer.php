<?php
    function checkLecturerNo()
    {
        global $con;
        $code = $_POST['lecturerno'];
        $select = "SELECT lecturer_no FROM tb_lecturer where lecturer_no='$code'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return false;
        }
        return true;
    }

    function getLecturer($id){
        global $con;
        $select = "SELECT * FROM tb_lecturer where id='$id'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return $check->fetch_assoc();
        }
        return false;
    }

    if(isset($_POST['addLecturer'])){
        global $con;
        $code = $_POST['lecturerno'];
        $fullname = $_POST['fullname'];
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $faculty_id = $_POST['faculty_id'];
        $religion_id = $_POST['religion_id'];

        $sql = "INSERT INTO tb_lecturer (lecturer_no,name,birth_date,gender,active,faculty_id,religion_id) VALUES ('$code','$fullname','$birthdate','$gender',TRUE,'$faculty_id','$religion_id')";
        
        if(checkLecturerNo() == TRUE)
        {
            $exec = mysqli_query($con,$sql);
            if($exec == TRUE){
                $url = "/pages/dashboard.php?page=L_Lecturer";
                $link = $baseUrl . $url;
                echo '<script> window.location.replace("'. $link .'");</script>';
                return true;
            }
            else{
                echo "<div class='alert alert-danger text-center'> Duplicate Lecturer No Detected. Please re-check the Lecturer No. </div>";                
            }
        }
        else
        {
            echo "<div class='alert alert-danger text-center'> Duplicate Lecturer No Detected. Please re-check the Lecturer No. </div>";
        }
    }
    if(isset($_POST['updateLecturer'])){
        global $con;
        $id = $_POST['id'];
        $fullname = $_POST['fullname']; 
        $birth_date = $_POST['birthdate'];
        $gender = $_POST['gender'];      
        $faculty_id = $_POST['faculty_id'];      
        $religion_id = $_POST['religion_id'];      
        $update = "UPDATE tb_lecturer set name='$fullname', birth_date='$birth_date', gender='$gender', faculty_id='$faculty_id', religion_id='$religion_id' where id='$id'";
        $exec = mysqli_query($con,$update);
        if($exec == TRUE){
            $url = "/pages/dashboard.php?page=L_Lecturer";
            $link = $baseUrl . $url;
            echo '<script> window.location.replace("'. $link .'");</script>';
            return true;
        }
        else{
            echo "<div class='alert alert-danger text-center'> The Lecturer cant but updated. Please recheck your data</div>";
        }
    }
?>