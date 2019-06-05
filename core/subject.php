<?php
    function checkSubjectCode()
    {
        global $con;
        $code = $_POST['subjectcode'];
        $select = "SELECT subject_code FROM tb_subject where subject_code='$code'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return false;
        }
        return true;
    }

    function insertSubject(){
        global $con;
        $code = $_POST['subjectcode'];
        $subject = $_POST['subject'];
        $faculty_id = $_POST['faculty_id'];
        $semester_id = $_POST['semester_id'];
        $lecturer_id = $_POST['lecturer_id'];
        $total_credit = $_POST['total_credit'];
        $sql = "INSERT INTO tb_subject (subject_code, subject_name, faculty_id, semester_id, lecturer_id, credits) VALUES ('$code','$subject','$faculty_id','$semester_id','$lecturer_id','$total_credit')";
        
        if(checkSubjectCode() == TRUE)
        {
            $exec = mysqli_query($con,$sql);
            if($exec == TRUE){
                $url = "/pages/dashboard.php?page=L_Subject";
                $link = $baseUrl . $url;
                echo '<script> window.location.replace("'. $link .'");</script>';
                return true;
            }
            else{
                echo "<div class='alert alert-danger text-center'> Duplicate Subject Code Detected. Please use another code. </div>";
            }    
        }
        else
        {
            echo "<div class='alert alert-danger text-center'> Duplicate Subject Code Detected. Please use another code. </div>";
        }
    }

    
    function getSubject($id)
    {
        global $con;
        $select = "SELECT tb_subject.*, tb_faculty.faculty_name, tb_semester.semester, tb_lecturer.name, credits FROM tb_subject
        INNER JOIN tb_faculty on tb_faculty.id = tb_subject.faculty_id
        INNER JOIN tb_semester on tb_semester.id = tb_subject.semester_id
        INNER JOIN tb_lecturer on tb_lecturer.id = tb_subject.lecturer_id
        WHERE tb_subject.id = '$id'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return $check->fetch_assoc();
        }
        return false;
    }


    if(isset($_POST['addSubject'])){
        insertSubject();
    }
    if(isset($_POST['updateSubject'])){
        global $con;
        $id = $_POST['id'];
        $subject = $_POST['subject'];
        $faculty_id = $_POST['faculty_id'];
        $semester_id = $_POST['semester_id'];       
        $lecturer_id = $_POST['lecturer_id'];       
        $total_credit = $_POST['total_credit'];       
        $update = "UPDATE tb_subject set subject_name='$subject', faculty_id ='$faculty_id', semester_id='$semester_id', lecturer_id='$lecturer_id',credits='$total_credit' where id='$id'";
        // var_dump($update);
        // die;
        $exec = mysqli_query($con,$update);
        if($exec == TRUE){
            $url = "/pages/dashboard.php?page=L_Subject";
            $link = $baseUrl . $url;
            echo '<script> window.location.replace("'. $link .'");</script>';
            return true;
        }
        else{
            echo "<div class='alert alert-danger text-center'> Duplicate Subject Code Detected. Please use another code. </div>";
        }
    }



?>