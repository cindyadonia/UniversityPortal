<h3> Add New Student </h3>
<?php
    require '../core/student.php';
    require '../core/config.php';
    $edit = false;
    if (isset($_GET["id"]))
    {
        $edit = true;
        $student = getStudent($_GET["id"]);
    }
?>
<form class="user" method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <?php
        if ($edit)
        {
            echo "<input type='hidden' name='id' value='" . $student["id"] . "'>";
        }
    ?>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text"  <?php if($edit){echo "readonly";}else{}?> value="<?php if($edit){ echo $student['student_no']; } else { echo ''; };?>" class="form-control" name="studentno" placeholder="Student No">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" value="<?php if($edit){ echo $student['name']; } else { echo ''; };?>" class="form-control" name="fullname" placeholder="Full Name">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" value="<?php if($edit){ echo $student['birth_date']; } else { echo ''; };?>" class="form-control" name="birthdate" placeholder="yyyy/mm/dd">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" value="<?php if($edit){ echo $student['contact_no']; } else { echo ''; };?>" class="form-control" name="contact_no" placeholder="Contact No">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" name="gender">
                <option  value="Male" <?php if($edit && $student['gender'] == 'Male'){ echo 'selected'; } else { echo ''; }; ?>>Male</option>
                <option  value="Female" <?php if($edit && $student['gender'] == 'Female'){ echo 'selected'; } else { echo ''; }; ?>>Female</option>
            </select>
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
                        if ($tampung['id'] == $student["faculty_id"])
                        {
                            echo "<option value='".$tampung['id']."' selected>".$tampung['faculty_name']."</option>";
                        } else {
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
                        if ($tampung['id'] == $student["religion_id"])
                        {
                            echo "<option value='".$tampung['id']."' selected>".$tampung['semester']."</option>";
                        } else {
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
            <select class="form-control" id="" name="religion_id">
                <option>Select Religion</option>
                <?php 
                $sql ="SELECT * FROM tb_religion";
                $query = mysqli_query($con,$sql);
                while($tampung = mysqli_fetch_array($query))
                {
                    if ($edit)
                    {
                        if ($tampung['id'] == $student["religion_id"])
                        {
                            echo "<option value='".$tampung['id']."' selected>".$tampung['religion']."</option>";
                        } else {
                            echo "<option value='".$tampung['id']."'>".$tampung['religion']."</option>";
                        }
                    }
                    echo "<option value='".$tampung['id']."'>".$tampung['religion']."</option>";
                }

                ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control" name="password" placeholder="Student Password Account">
        </div>
    </div>

    <button type="submit" name="<?php if($edit){ echo 'updateStudent'; } else { echo 'addStudent'; }; ?>"  class="btn btn-primary btn-user">
        <?php if ($edit) { echo "Update Student"; } else { echo 'Add Student'; } ?>
    </button>
</form>
