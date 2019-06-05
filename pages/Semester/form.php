<h3> Semester Form </h3>
<?php
    require '../core/config.php';
    require '../core/semester.php';

    $edit = false;
    if (isset($_GET["id"]))
    {
        $edit = true;
        $semester = getSemester($_GET["id"]);
    }
?>
<form class="user" method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <?php
        if ($edit)
        {
            echo "<input type='hidden' name='id' value='" . $semester["id"] . "'>";
        }
    ?>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" <?php if($edit){echo "disabled";}else{}?> value="<?php if($edit){ echo $semester['semester_code']; } else { echo ''; }; ?>" class="form-control form-control-user" id="semestercode" name="semestercode" placeholder="Semester Code" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" value="<?php if($edit){ echo $semester['semester']; } else { echo ''; }; ?>" id="semester" name="semester" placeholder="Semester" required>
        </div>
    </div>
    <button type="submit" name="<?php if($edit){ echo 'updateSemester'; } else { echo 'addSemester'; }; ?>" class="btn btn-primary btn-user">
        <?php if ($edit) { echo "Update Semester"; } else { echo 'Add Semester'; } ?>
    </button>
</form>