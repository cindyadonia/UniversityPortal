<h3> Subject Form </h3>
<?php
    require '../core/config.php';
    require '../core/subject.php';

    $edit = false;
    if (isset($_GET["id"]))
    {
        $edit = true;
        $subject = getSubject($_GET["id"]);
    }
?>
<form class="user" method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <?php
        if ($edit)
        {
            echo "<input type='hidden' name='id' value='" . $subject["id"] . "'>";
        }
    ?>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" <?php if($edit){echo "disabled";}else{}?> value="<?php if($edit){ echo $subject['subject_code']; } else { echo ''; }; ?>" class="form-control" name="subjectcode" placeholder="Subject Code">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" value="<?php if($edit){ echo $subject['subject_name']; } else { echo ''; }; ?>" class="form-control" id="" name="subject" placeholder="Subject">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" id="" name="faculty_id">
                <option>Select Faculty</option>
                <?php 
                $sql ="SELECT * FROM tb_faculty";
                $query = mysqli_query($con,$sql);
                while($tampung = mysqli_fetch_array($query))
                {
                    if ($edit)
                    {
                        if ($tampung['id'] == $subject["faculty_id"])
                        {
                            echo "<option value='".$tampung['id']."' selected>".$tampung['faculty_name']."</option>";
                        }
                        else
                        {
                            echo "<option value='".$tampung['id']."'>".$tampung['faculty_name']."</option>";
                        }
                    }
                    else
                    {
                        echo "<option value='".$tampung['id']."'>".$tampung['faculty_name']."</option>";
                    }
                }

                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" id="" name="semester_id">
                <option>Select Semester</option>
                <?php 
                $sql ="SELECT * FROM tb_semester";
                $query = mysqli_query($con,$sql);
                while($tampung = mysqli_fetch_array($query))
                {
                    if ($edit)
                    {
                        if ($tampung['id'] == $subject["semester_id"])
                        {
                            echo "<option value='".$tampung['id']."' selected>".$tampung['semester']."</option>";
                        }
                        else
                        {
                            echo "<option value='".$tampung['id']."'>".$tampung['semester']."</option>";
                        }
                    }
                    else
                    {
                        echo "<option value='".$tampung['id']."'>".$tampung['semester']."</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" name="lecturer_id">
            
                <option>Select Lecturer</option>
                <?php 
                $sql ="SELECT * FROM tb_lecturer";
                $query = mysqli_query($con,$sql);
                while($tampung = mysqli_fetch_array($query))
                {
                    if ($edit)
                    {
                        if ($tampung['id'] == $subject["lecturer_id"])
                        {
                            echo "<option value='".$tampung['id']."' selected>".$tampung['name']."</option>";
                        } else {
                            echo "<option value='".$tampung['id']."'>".$tampung['name']."</option>";
                        }
                    } else {
                        echo "<option value='".$tampung['id']."'>".$tampung['name']."</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control" value="<?php if($edit){ echo $subject['credits']; } else { echo ''; }; ?>" name="total_credit" placeholder="Total Credit">
        </div>
    </div>
    
    <button type="submit" name="<?php if($edit){ echo 'updateSubject'; } else { echo 'addSubject'; }; ?>" class="btn btn-primary btn-user">
        <?php if ($edit) { echo "Update Subject"; } else { echo 'Add Subject'; } ?>
    </button>
</form>