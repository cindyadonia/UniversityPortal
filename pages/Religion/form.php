<h3> Religion Form </h3>
<?php
    require '../core/config.php';
    require '../core/religion.php';

    $edit = false;
    if (isset($_GET["id"]))
    {
        $edit = true;
        $religion = getReligion($_GET["id"]);
    }
?>

<form class="user" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    <?php
        if ($edit)
        {
            echo "<input type='hidden' name='id' value='" . $religion["id"] . "'>";
        }
    ?>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" <?php if($edit){echo "disabled";}else{}?>  class="form-control form-control-user" id="religioncode" name="religioncode" placeholder="Religion Code" value="<?php if($edit){ echo $religion['religion_code']; } else { echo ''; }; ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="religion" name="religion" placeholder="Religion" value="<?php if($edit){ echo $religion['religion']; } else { echo ''; }; ?>" required>
        </div>
    </div>
    <button type="submit" name="<?php if($edit){ echo 'updateReligion'; } else { echo 'addReligion'; }; ?>" class="btn btn-primary btn-user">
        <?php if ($edit) { echo "Update Religion"; } else { echo 'Add New Religion'; } ?>
    </button>
</form>