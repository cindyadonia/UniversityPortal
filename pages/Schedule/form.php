<h3> Subject Schedule Form </h3>
<?php
    require '../core/config.php';
    require '../core/schedule.php';
    
    $edit = false;
    if (isset($_GET["id"]))
    {
        $edit = true;
        $subjectschedule = getSubjectSchedule($_GET["id"]);
    }
?>
<form class="user" method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <?php
        if ($edit)
        {
            echo "<input type='hidden' name='id' value='" . $subjectschedule["id"] . "'>";
        }
    ?>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" id="" name="subject_id" required>
                <option>Select Subject</option>
                <?php 
                $sql ="SELECT tb_subject.*, CONCAT(tb_subject.subject_name,' [',tb_subject.subject_code,']') as subject FROM tb_subject";
                $query = mysqli_query($con,$sql);
                while($tampung = mysqli_fetch_array($query))
                {
                    if ($edit)
                    {
                        if ($tampung['id'] == $subjectschedule["subject_id"])
                        {
                            echo "<option value='".$tampung['id']."' selected>".$tampung['subject']."</option>";
                        } else {
                            echo "<option value='".$tampung['id']."'>".$tampung['subject']."</option>";
                        }
                    }
                    else
                    {
                        echo "<option value='".$tampung['id']."'>".$tampung['subject']."</option>";
                    }
                }

                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" id="" name="classroom_id">
                <option>Select Classroom</option>
                <?php 
                $sql ="SELECT * FROM tb_classroom";
                $query = mysqli_query($con,$sql);
                while($tampung = mysqli_fetch_array($query))
                {
                    if ($edit)
                    {
                        if ($tampung['id'] == $subjectschedule["subject_id"])
                        {
                            echo "<option value='".$tampung['id']."' selected>".$tampung['classroom']."</option>";
                        } else {
                            echo "<option value='".$tampung['id']."'>".$tampung['classroom']."</option>";
                        }
                    }
                    else
                    {
                        echo "<option value='".$tampung['id']."'>".$tampung['classroom']."</option>";
                    }
                }

                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" id="" name="time_id">
                <option>Select Time</option>
                <?php 
                $sql ="SELECT tb_time.id, CONCAT(tb_time.day,' ',tb_time.time) as date FROM tb_time";
                $query = mysqli_query($con,$sql);
                while($tampung = mysqli_fetch_array($query))
                {
                    if ($edit)
                    {
                        if ($tampung['id'] == $subjectschedule["time_id"])
                        {
                            echo "<option value='".$tampung['id']."' selected>".$tampung['date']."</option>";
                        } else {
                            echo "<option value='".$tampung['id']."'>".$tampung['date']."</option>";
                        }
                    }
                    else
                    {
                        echo "<option value='".$tampung['id']."'>".$tampung['date']."</option>";
                    }
                }

                ?>
            </select>
        </div>
    </div>

    <button type="submit"  name="<?php if($edit){ echo 'updateSubjectSchedule'; } else { echo 'addSubjectSchedule'; }; ?>" class="btn btn-primary btn-user">
        <?php if ($edit) { echo "Update Subject Schedule"; } else { echo 'Add Subject Schedule'; } ?>
    </button>
</form>
