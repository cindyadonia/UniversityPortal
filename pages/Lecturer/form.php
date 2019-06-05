<h3> Lecturer Form </h3>
<?php
    require '../core/config.php';
    require '../core/lecturer.php';
    $edit = false;
    if (isset($_GET["id"]))
    {
        $edit = true;
        $lecturer = getLecturer($_GET["id"]);
    }
?>
<form class="user" method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <?php
        if ($edit)
        {
            echo "<input type='hidden' name='id' value='" . $lecturer["id"] . "'>";
        }
    ?>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text"  <?php if($edit){echo "disabled";}else{}?>  value="<?php if($edit){ echo $lecturer['lecturer_no']; } else { echo ''; }; ?>" class="form-control " name="lecturerno" placeholder="Lecturer No">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text"  value="<?php if($edit){ echo $lecturer['name']; } else { echo ''; }; ?>"class="form-control" name="fullname" placeholder="Full Name">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text"  value="<?php if($edit){ echo $lecturer['birth_date']; } else { echo ''; }; ?>"class="form-control" name="birthdate" placeholder="yyyy/mm/dd">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" name="gender">
                <option  value="Male" <?php if($edit && $lecturer['gender'] == 'Male'){ echo 'selected'; } else { echo ''; }; ?>>Male</option>
                <option  value="Female" <?php if($edit && $lecturer['gender'] == 'Female'){ echo 'selected'; } else { echo ''; }; ?>>Female</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" name="faculty_id">
                <option>Select Faculty</option>
                <?php 
                $sql ="SELECT * FROM tb_faculty";
                $query = mysqli_query($con,$sql);
                while($tampung = mysqli_fetch_array($query))
                {
                    if ($edit)
                    {
                        if ($tampung['id'] == $lecturer["faculty_id"])
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
            <select class="form-control" name="religion_id">
                <option>Select Religion</option>
                <?php 
                $sql ="SELECT * FROM tb_religion";
                $query = mysqli_query($con,$sql);
                while($tampung = mysqli_fetch_array($query))
                {
                    if ($edit)
                    {
                        if ($tampung['id'] == $lecturer["religion_id"])
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

    <button type="submit" name="<?php if($edit){ echo 'updateLecturer'; } else { echo 'addLecturer'; }; ?>" class="btn btn-primary btn-user">
        <?php if ($edit) { echo "Update Lecturer"; } else { echo 'Add Lecturer'; } ?>
    </button>
</form>
