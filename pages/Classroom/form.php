<h3> Add Classroom </h3>
<?php
    require '../core/config.php';
    require '../core/classroom.php';

    $edit = false;
    if (isset($_GET["id"]))
    {
        $edit = true;
        $classroom = getClassroom($_GET["id"]);
    }
?>
<form class="user" method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <?php
        if ($edit)
        {
            echo "<input type='hidden' name='id' value='" . $classroom["id"] . "'>";
        }
    ?>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" value="<?php if($edit){ echo $classroom['classroom']; } else { echo ''; }; ?>" class="form-control form-control-user" id="classroom" name="classroom" placeholder="Classroom">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" value="<?php if($edit){ echo $classroom['capacity']; } else { echo ''; }; ?>" class="form-control form-control-user" id="capacity" name="capacity" placeholder="Capacity in number">
        </div>
    </div>
    <button type="submit"  name="<?php if($edit){ echo 'updateClassroom'; } else { echo 'addClassroom'; }; ?>" class="btn btn-primary btn-user">
        <?php if ($edit) { echo "update Classroom"; } else { echo 'Add Classroom'; } ?>
    </button>
</form>