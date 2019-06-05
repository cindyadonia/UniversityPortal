<?php
    function checkClassroom()
    {
        global $con;
        $classroom = $_POST['classroom'];
        $select = "SELECT classroom FROM tb_classroom where classroom='$classroom'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return false;
        }
        return true;
    }

    function getClassroom($id){
        global $con;
        $select = "SELECT * FROM tb_classroom where id='$id'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return $check->fetch_assoc();
        }
        return false;
    }

    if(isset($_POST['addClassroom'])){
        global $con;
        $classroom = $_POST['classroom'];
        $capacity = $_POST['capacity'];
        $sql = "INSERT INTO tb_classroom (classroom, capacity) VALUES ('$classroom','$capacity')";
        
        if(checkClassroom() == TRUE)
        {
            $exec = mysqli_query($con,$sql);
            if($exec == TRUE){
                $url = "/pages/dashboard.php?page=L_Classroom";
                $link = $baseUrl . $url;
                echo '<script> window.location.replace("'. $link .'");</script>';
                return true;
            }
            else{
                echo "<div class='alert alert-danger text-center'> Duplicate Classroom Detected. Please input another classroom </div>";                
            }
        }
        else
        {
            echo "<div class='alert alert-danger text-center'> Duplicate Classroom Detected. Please input another classroom </div>";
        }
    }
    if(isset($_POST['updateClassroom'])){
        global $con;
        $id = $_POST['id'];
        $classroom = $_POST['classroom']; 
        $capacity = $_POST['capacity'];      
        $update = "UPDATE tb_classroom set classroom='$classroom', capacity='$capacity' where id='$id'";
        $exec = mysqli_query($con,$update);
        if($exec == TRUE){
            $url = "/pages/dashboard.php?page=L_Classroom";
            $link = $baseUrl . $url;
            echo '<script> window.location.replace("'. $link .'");</script>';
            return true;
        }
        else{
            echo "<div class='alert alert-danger text-center'> The class cant but updated. Please recheck your data</div>";
        }
    }




    // ||||    ||||      ||| 
    // |||| || ||||    ||| |||
    // |||| || ||||   |||___|||
    //   |||  |||    |||     |||

    //   ||||| |||||
    // |||   |||   |||
    //  ||         ||
    //   ||       ||
    //     ||    ||
    //       |::|

    //   |||     |||
    //   |||     |||
    //   |||     |||
    //   |||||||||||

    // HAHAHHAHAA, mempersingkat :)
    // :* :* :*

    // WKWKWKWKWK
    // ini niat sih
    // Byeee :*
    // daa
?>