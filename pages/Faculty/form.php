<h3> Faculty Form</h3>
<?php
    require '../core/config.php';
    require '../core/faculty.php';

    $edit = false;
    if (isset($_GET["id"]))
    {
        $edit = true;
        $faculty = getFaculty($_GET["id"]);
    }
?>
<form class="user" method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <?php
        if ($edit)
        {
            echo "<input type='hidden' name='id' value='" . $faculty["id"] . "'>";
        }
    ?>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" <?php if($edit){echo "disabled";}else{}?> value="<?php if($edit){ echo $faculty['faculty_code']; } else { echo ''; }; ?>" class="form-control form-control-user" name="facultycode" placeholder="Faculty Code">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" value="<?php if($edit){ echo $faculty['faculty_name']; } else { echo ''; }; ?>" class="form-control form-control-user" name="faculty" placeholder="Faculty">
        </div>
    </div>
    <button type="submit" name="<?php if($edit){ echo 'updateFaculty'; } else { echo 'addFaculty'; }; ?>" class="btn btn-primary btn-user">
        <?php if ($edit) { echo "Update Faculty"; } else { echo 'Add Faculty'; } ?>
    </button>
</form>