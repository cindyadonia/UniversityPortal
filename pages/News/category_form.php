<h3> News Category Form </h3>
<?php
    require '../core/config.php';
    require '../core/news.php';
    $edit = false;
    if (isset($_GET["id"]))
    {
        $edit = true;
        $category = getCategory($_GET["id"]);
    }
?>
<form class="user" method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <?php
        if ($edit)
        {
            echo "<input type='hidden' name='id' value='" . $category["id"] . "'>";
        }
    ?>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" <?php if($edit){echo "disabled";}?> value="<?php if($edit){ echo $category['news_category_code']; } else { echo ''; }; ?>" class="form-control form-control-user" name="categorycode" placeholder="News Category Code">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" value="<?php if($edit){ echo $category['news_category']; } else { echo ''; }; ?>" class="form-control form-control-user" name="category" placeholder="News Category">
        </div>
    </div>
    <button type="submit" name="<?php if($edit){ echo 'updateCategory'; } else { echo 'addCategory'; }; ?>" class="btn btn-primary btn-user">
    <?php if ($edit) { echo "Update News Category"; } else { echo 'Add News Category'; } ?>
    </button>
</form>