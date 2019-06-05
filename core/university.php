<?php
    function getUniversityInfo()
    {
        global $con;
        $select = "SELECT * FROM tb_university_info LIMIT 1";
        $check = mysqli_query($con,$select);
        if($check->num_rows > 0){
            return $check->fetch_assoc();
        } else {
            // Create university details here
            $sql = "INSERT INTO tb_university_info (university_code, university_name, address, year_founded, description, vision, mission) VALUES ('UIB','Universitas Internasional Batam','Jalan Gajah Mada Baloi, Sei Ladi, Sekupang, Kota Batam, Kepulauan Riau 29442, Indonesia','2000','Ini adalah kampus internasional.','Menjadi kampus yang lebih internasional lagi.','Mengajarkan nilai2 penting kepada mahasiswa')";
            $query = mysqli_query($con, $sql);
        }
        return false;
    }

    if(isset($_POST['updateUniversityInfo'])){
        global $con;
        $id = $_POST['id'];
        $university_code = $_POST['university_code'];
        $university_name = $_POST['university_name'];
        $address = $_POST['address'];
        $year_founded = $_POST['year_founded'];
        $description = $_POST['description'];
        $vision = $_POST['vision'];
        $mission = $_POST['mission'];
        $update = "UPDATE tb_university_info set university_code='$university_code', university_name='$university_name', address='$address', year_founded='$year_founded', description='$description', vision='$vision', mission='$mission' where id='$id'";
        $exec = mysqli_query($con,$update);
        if($exec == TRUE){
            $url = "/pages/dashboard.php";
            $link = $baseUrl . $url;
            echo '<script> window.location.replace("'. $link .'");</script>';
            return true;
        }
        else{
            echo "<div class='alert alert-danger text-center'> Duplicate News Category Code Detected. Please use another code. </div>";
        }
    }
?>