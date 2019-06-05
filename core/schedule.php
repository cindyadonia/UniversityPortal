<?php
    require'config.php';
    
    function checkSubjectId()
    {
        global $con;
        $id = $_POST['subject_id'];
        $select = "SELECT subject_id FROM tb_subject_schedule where subject_id='$id'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return false;
        }
        return true;
    }

    function checkStudentSchedule()
    {
        global $con;
        $student_id = $_POST['student_id'];
        $subject_id = $_POST['subject_id'];
        $select = "SELECT student_id, subject_id FROM tb_students_schedule where student_id='$student_id' AND subject_id='$subject_id'";
        $check = mysqli_query($con,$select);
        if($check != false)
        {
            if($check->num_rows >0){
                return false;
            }
        }
        else
        {
            return true;
        }
        return true;
    }

    function getSubjectSchedule($id)
    {
        global $con;
        $select = "SELECT tb_subject_schedule.*, tb_subject.subject_name, tb_classroom.classroom, tb_time.day, tb_time.time FROM tb_subject_schedule
        INNER JOIN tb_subject on tb_subject.id = tb_subject_schedule.subject_id
        INNER JOIN tb_classroom on tb_classroom.id = tb_subject_schedule.classroom_id
        INNER JOIN tb_time on tb_time.id = tb_subject_schedule.time_id
        WHERE tb_subject_schedule.id = '$id'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return $check->fetch_assoc();
        }
        return false;
    }

    function getStudentSchedule($id)
    {
        global $con;
        $select = "SELECT tb_students_schedule.*, tb_students.name, tb_students.student_no, tb_subject.subject_name FROM tb_students_schedule
        INNER JOIN tb_subject on tb_subject.id = tb_students_schedule.subject_id
        INNER JOIN tb_students on tb_students.id = tb_students_schedule.student_id
        where tb_students_schedule.id = '$id'";

        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return $check->fetch_assoc();
        }
        return false;
    }

    
    if(isset($_POST['addSubjectSchedule'])){
        global $con;
        $id = $_POST['subject_id'];
        $classroom_id = $_POST['classroom_id'];
        $time_id = $_POST['time_id'];
        $sql = "INSERT INTO tb_subject_schedule (subject_id,classroom_id,time_id) VALUES ('$id','$classroom_id','$time_id')";
        
        if(checkSubjectId() == TRUE)
        {
            $exec = mysqli_query($con,$sql);
            if($exec == TRUE){
                $url = "/pages/dashboard.php?page=L_Schedule";
                $link = $baseUrl . $url;
                echo '<script> window.location.replace("'. $link .'");</script>';
                return true;
            }
            else{
                echo "<div class='alert alert-danger text-center'> The Subject You Choose already has it's own schedule. Please choose another subject. </div>";
            }    
        }
        else
        {
            echo "<div class='alert alert-danger text-center'> The Subject You Choose already has it's own schedule. Please choose another subject. </div>";
        }
    }

    
    if(isset($_POST['updateSubjectSchedule'])){
        global $con;
        $id = $_POST['id'];
        $subject_id = $_POST['subject_id'];       
        $classroom_id = $_POST['classroom_id'];       
        $time_id = $_POST['time_id'];       
        $update = "UPDATE tb_subject_schedule set subject_id='$subject_id', classroom_id ='$classroom_id',time_id='$time_id' where tb_subject_schedule.id='$id'";
        $exec = mysqli_query($con,$update);
        if($exec == TRUE){
            $url = "/pages/dashboard.php?page=L_Schedule";
            $link = $baseUrl . $url;
            echo '<script> window.location.replace("'. $link .'");</script>';
            return true;
        }
        else{
            echo "<div class='alert alert-danger text-center'> Duplicate Subject Code Detected. Please use another code. </div>";
        }
    }

    if(isset($_POST['updateStudentSchedule'])){
        global $con;
        $id = $_POST['id'];
        $student_id = $_POST['student_id'];
        $subject_id = $_POST['subject_id'];       
        $query = "SELECT * FROM tb_students_schedule WHERE student_id='$student_id' AND subject_id='$subject_id'";
        $result = mysqli_query($con, $query);
        if($result->num_rows > 0)
        {
            echo "<div class='alert alert-danger text-center'> The record can't be updated. Please re-check your value. </div>";
        }
        else
        {
            $update = "UPDATE tb_students_schedule set subject_id='$subject_id', student_id ='$student_id' where tb_students_schedule.id='$id'";
            $exec = mysqli_query($con,$update);
            if($exec == TRUE){
                $url = "/pages/dashboard.php?page=L_Student_Schedule";
                $link = $baseUrl . $url;
                echo '<script> window.location.replace("'. $link .'");</script>';
                return true;
            }
            else{
                echo "<div class='alert alert-danger text-center'> The record can't be updated. Please re-check your value. </div>";
            }
        }
    }

    if(isset($_POST['addStudentSchedule'])){
        global $con;
        $student_id = $_POST['student_id'];
        $subject_id = $_POST['subject_id'];
        $sql = "INSERT INTO tb_students_schedule (student_id,subject_id) VALUES ('$student_id','$subject_id')";
        
        if(checkStudentSchedule() == TRUE)
        {
            $exec = mysqli_query($con,$sql);
            if($exec == TRUE){
                $url = "/pages/dashboard.php?page=L_Student_Schedule";
                $link = $baseUrl . $url;
                echo '<script> window.location.replace("'. $link .'");</script>';
                return true;
            }
            else{
                echo "<div class='alert alert-danger text-center'> This Student already have the choosen schedule. Please choose another schedule. </div>";
            }    
        }
        else
        {
            echo "<div class='alert alert-danger text-center'> This Student already have the choosen schedule. Please choose another schedule. </div>";
        }
    }

    



?>