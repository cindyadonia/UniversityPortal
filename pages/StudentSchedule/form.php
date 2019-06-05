<h3> Add Student Schedule </h3>
<?php
    require '../core/schedule.php';
    require '../core/config.php';
    $edit = false;
    if (isset($_GET["id"]))
    {
        $edit = true;
        $studentschedule = getStudentSchedule($_GET["id"]);
    }
?>
<form class="user" method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <?php
        if ($edit)
        {
            echo "<input type='hidden' name='id' value='" . $studentschedule["id"] . "'>";
        }
    ?>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" id="" name="student_id">
                <option>Select Student</option>
                <?php 
                $sql ="SELECT id, CONCAT(tb_students.name,' [',tb_students.student_no,']') as student FROM tb_students";
                $query = mysqli_query($con,$sql);
                while($tampung = mysqli_fetch_array($query))
                {
                    if ($edit)
                    {
                        if ($tampung['id'] == $studentschedule["student_id"])
                        {
                            echo "<option value='".$tampung['id']."' selected>".$tampung['student']."</option>";
                        } else {
                            echo "<option value='".$tampung['id']."'>".$tampung['student']."</option>";
                        }
                    }
                    else
                    {
                        echo "<option value='".$tampung['id']."'>".$tampung['student']."</option>";
                    }
                }

                ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" id="" name="subject_id">
                <option>Select Subject</option>
                <?php 
                $sql ="SELECT tb_subject.*, CONCAT(subject_name,' [',subject_code,']') as subjectdetails FROM tb_subject";
                $query = mysqli_query($con,$sql);
                while($tampung = mysqli_fetch_array($query))
                {
                    if ($edit)
                    {
                        if ($tampung['id'] == $studentschedule["subject_id"])
                        {
                            echo "<option value='".$tampung['id']."' selected>".$tampung['subjectdetails']."</option>";
                        } else {
                            echo "<option value='".$tampung['id']."'>".$tampung['subjectdetails']."</option>";
                        }
                    }
                    else
                    {
                        echo "<option value='".$tampung['id']."'>".$tampung['subjectdetails']."</option>";
                    }
                }

                ?>
            </select>
        </div>
    </div>

    <button type="submit"  name="<?php if($edit){ echo 'updateStudentSchedule'; } else { echo 'addStudentSchedule'; }; ?>" class="btn btn-primary btn-user">
       <?php if ($edit) { echo "Update Student Schedule"; } else { echo 'Add Student Schedule'; } ?>
    </button>
</form>
