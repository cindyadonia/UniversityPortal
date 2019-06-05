<h3> Add News </h3>
<?php
    require '../core/config.php';
    require '../core/news.php';
    $edit=false;
    if (isset($_GET["id"]))
    {
        $edit = true;
        $news = getNews($_GET["id"]);
    }
?>
<form class="user" method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <?php
        if ($edit)
        {
            echo "<input type='hidden' name='id' value='" . $news["id"] . "'>";
        }
    ?>
    <div class="form-group row">
        <div class="col-sm-8 mb-3 mb-sm-0">
            <input type="text"  value="<?php if($edit){ echo $news['title']; } else { echo ''; }; ?>"  class="form-control" name="title" placeholder="Title">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-8 mb-3 mb-sm-0">
            <select class="form-control" id="" name="news_category_id">
                <option>Select News Category</option>
                <?php 
                $sql ="SELECT * FROM tb_news_category";
                $query = mysqli_query($con,$sql);
                while($tampung = mysqli_fetch_array($query))
                {
                    if ($edit)
                    {
                        if ($tampung['id'] == $news["news_category_id"])
                        {
                            echo "<option value='".$tampung['id']."' selected>".$tampung['news_category']."</option>";
                        } else {
                            echo "<option value='".$tampung['id']."'>".$tampung['news_category']."</option>";
                        }
                    }
                    else
                    {
                        echo "<option value='".$tampung['id']."'>".$tampung['news_category']."</option>";
                    }
                }

                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <textarea style="resize:none" name="content"  rows="15" class="form-control" placeholder="Write your news Content here"><?php if($edit){ echo $news['content']; } else { echo ''; }; ?></textarea>
        </div>
    </div>
    
    <button type="submit" name="<?php if($edit){ echo 'updateNews'; } else { echo 'addNews'; }; ?>" class="btn btn-primary btn-user">
        <?php if ($edit) { echo "Update News"; } else { echo 'Add News'; } ?>
    </button>
</form>
