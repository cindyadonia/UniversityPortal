<?php
    function checkNewsCategoryCode()
    {
        global $con;
        $code = $_POST['categorycode'];
        $select = "SELECT news_category_code FROM tb_news_category where news_category_code='$code'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return false;
        }
        return true;
    }

    function getCategory($id)
    {
        global $con;
        $select = "SELECT * FROM tb_news_category where id='$id'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return $check->fetch_assoc();
        }
        return false;
    }

    function getNews($id)
    {
        global $con;
        $select = "SELECT * FROM tb_news where id='$id'";
        $check = mysqli_query($con,$select);
        if($check->num_rows >0){
            return $check->fetch_assoc();
        }
        return false;
    }

    function updateCategory($id){
    }

    if(isset($_POST['addCategory'])){
        global $con;
        $code = $_POST['categorycode'];
        $category = $_POST['category'];
        $sql = "INSERT INTO tb_news_category (news_category_code, news_category) VALUES ('$code','$category')";
        
        if(checkNewsCategoryCode    () == TRUE)
        {
            $exec = mysqli_query($con,$sql);
            if($exec == TRUE){
                $url = "/pages/dashboard.php?page=L_News_Category";
                $link = $baseUrl . $url;
                echo '<script> window.location.replace("'. $link .'");</script>';
                return true;
            }
            else{
                echo "<div class='alert alert-danger text-center'> Duplicate News Category Code. Please use another code. </div>";                
            }
        }
        else
        {
            echo "<div class='alert alert-danger text-center'> Duplicate News Category Code. Please use another code. </div>";
        }
    }
    if(isset($_POST['updateCategory'])){
        global $con;
        $id = $_POST['id'];
        $category = $_POST['category'];       
        $update = "UPDATE tb_news_category set news_category='$category' where id='$id'";
        // var_dump($update);
        // die;
        $exec = mysqli_query($con,$update);
        if($exec == TRUE){
            $url = "/pages/dashboard.php?page=L_News_Category";
            $link = $baseUrl . $url;
            echo '<script> window.location.replace("'. $link .'");</script>';
            return true;
        }
        else{
            echo "<div class='alert alert-danger text-center'> Duplicate News Category Code Detected. Please use another code. </div>";
        }  
    }

    if(isset($_POST['addNews'])){
        global $con;
        $title = $_POST['title'];
        $news_category_id = $_POST['news_category_id'];
        $content = $_POST['content'];

        $sql = "INSERT INTO tb_news (title,content,news_category_id) VALUES ('$title','$content','$news_category_id')";
        $exec = mysqli_query($con,$sql);
        if($exec == TRUE){
            $host = "http://" . $_SERVER['HTTP_HOST'];
            $url = "/pages/dashboard.php?page=L_News";
            $link = $baseUrl . $url;
            echo '<script> window.location.replace("'. $link .'");</script>';
            return true;
        }
        else{
            return false;
        }
    };

    if(isset($_POST['updateNews'])){
        global $con;
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $news_category_id = $_POST['news_category_id'];       
        $update = "UPDATE tb_news set title='$title', content='$content', news_category_id='$news_category_id' where id='$id'";
        $exec = mysqli_query($con,$update);
        if($exec == TRUE){
            $url = "/pages/dashboard.php?page=L_News";
            $link = $baseUrl . $url;
            echo '<script> window.location.replace("'. $link .'");</script>';
            return true;
        }
        else{
            echo "<div class='alert alert-danger text-center'> Duplicate News Category Code Detected. Please use another code. </div>";
        }  
    }
?>