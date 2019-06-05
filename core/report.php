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


    if(isset($_POST['checkDetails'])){
        global $con;
        $semester_id = $_POST['semester_id'];
        $subject_id = $_POST['subject_id'];
        $sql = "SELECT tb_subject_schedule.id, tb_subject.subject_code, tb_subject.subject_name, tb_students.name as student_name, tb_semester.semester, tb_lecturer.name as lecturer_name, tb_classroom.classroom, CONCAT(tb_time.day,' ', tb_time.time) as date FROM tb_subject_schedule
        INNER JOIN tb_subject on tb_subject.id = tb_subject_schedule.subject_id
        INNER JOIN tb_semester on tb_semester.id = tb_subject.semester_id
        INNER JOIN tb_lecturer on tb_lecturer.id = tb_subject.lecturer_id
        INNER JOIN tb_time on tb_time.id = tb_subject_schedule.time_id
        INNER JOIN tb_classroom on tb_classroom.id = tb_subject_schedule.classroom_id
        INNER JOIN tb_students_schedule on tb_students_schedule.subject_id = tb_subject.id
        INNER JOIN tb_students on tb_students.id = tb_students_schedule.subject_id
        WHERE tb_subject.id = '$subject_id' AND tb_students.current_semester_id='$semester_id';";
        
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



?>