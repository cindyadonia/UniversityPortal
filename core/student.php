<?php
    function checkStudentNo()
    {
        global $con;
        $student_no = $_POST['studentno'];
        $select = "SELECT student_no FROM tb_student where student_no='$student_no'";
        $check = mysqli_query($con,$select);
        if($check->num_rows > 0){
            return false;
        }
        return true;
    }
    
    function getStudent($id)
    {
        global $con;
        $select = "SELECT tb_students.*, name, student_no, birth_date, contact_no, gender, tb_faculty.faculty_name, tb_semester.semester, tb_religion.religion
        FROM tb_students
        INNER JOIN tb_faculty on tb_faculty.id = tb_students.faculty_id
        INNER JOIN tb_semester on tb_semester.id = tb_students.current_semester_id
        INNER JOIN tb_religion on tb_religion.id = tb_students.religion_id
        where tb_students.id = '$id'";

        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return $check->fetch_assoc();
        }
        return false;
    }

    if(isset($_POST['addStudent'])){
        global $con;
        $studentno = $_POST['studentno'];
        $fullname = $_POST['fullname'];
        $birthdate = $_POST['birthdate'];
        $contact_no = $_POST['contact_no'];
        $gender = $_POST['gender'];
        $faculty_id = $_POST['faculty_id'];
        $semester_id = $_POST['semester_id'];
        $religion_id = $_POST['religion_id'];
        $password = $_POST['password'];
        $sql1 = "INSERT INTO tb_students (student_no,name,birth_date,contact_no,gender,account_active,faculty_id,current_semester_id,religion_id) VALUES
        ('$studentno','$fullname','$birthdate','$contact_no','$gender',TRUE,'$faculty_id','$semester_id','$religion_id')";

        if(checkStudentNo() == TRUE)
        {
            $sql2 = "INSERT INTO tb_users (username,password,role) VALUES ('$studentno','$password','2')";
            $exec2 = mysqli_query($con,$sql2);

            $exec = mysqli_query($con,$sql1);
            if($exec == TRUE){
                $url = "/pages/dashboard.php?page=L_Student";
                $link = $baseUrl . $url;

                // var_dump($link);
                // die;
                
                
                echo '<script> window.location.replace("'. $link .'");</script>';
                return true;
            }
            else{
                echo "<div class='alert alert-danger text-center'> Duplicate Student No Detected. Please use another Student No. </div>";
            }    
        }
        else
        {
            echo "<div class='alert alert-danger text-center'> Duplicate Student No Detected. Please use another Student No. </div>";
        }
    }
    if(isset($_POST['updateStudent'])){
        global $con;
        $id = $_POST['id']; 
        $student_no = $_POST['studentno'];
        $fullname = $_POST['fullname']; 
        $birth_date = $_POST['birthdate'];
        $contact_no = $_POST['contact_no'];
        $gender = $_POST['gender'];      
        $faculty_id = $_POST['faculty_id'];
        $semester_id = $_POST['semester_id'];
        $religion_id = $_POST['religion_id'];      
        $password = $_POST['password'];

        $update = "UPDATE tb_students set name='$fullname', birth_date='$birth_date', gender='$gender', faculty_id='$faculty_id', religion_id='$religion_id' where id='$id'";
        $exec = mysqli_query($con,$update);
        
        if(isset($password) && $password!=="")
        {
            $update2 = "UPDATE tb_users set password='$password' where username='$student_no'";
            $exec2 = mysqli_query($con, $update2);
        }
        if($exec == TRUE){
            $url = "/pages/dashboard.php?page=L_Student";
            $link = $baseUrl . $url;
            echo '<script> window.location.replace("'. $link .'");</script>';
            return true;
        }
        else{
            echo "<div class='alert alert-danger text-center'> The Lecturer cant but updated. Please recheck your data</div>";
        }   
    }
?>