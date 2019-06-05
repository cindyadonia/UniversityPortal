<h3> University Information </h3>
<?php
    require '../core/config.php';
    require '../core/university.php';

    $university = getUniversityInfo();
?>
<form class="user" method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <?php
        echo "<input type='hidden' name='id' value='" . $university["id"] . "'>";
    ?>

    University Code
    <div class="form-group row">
        <div class="col-sm-8 mb-3 mb-sm-0">
            <input type="text"  value="<?php echo $university['university_code']; ?>"  class="form-control" name="university_code" placeholder="University Code">
        </div>
    </div>

    University Name
    <div class="form-group row">
        <div class="col-sm-8 mb-3 mb-sm-0">
            <input type="text"  value="<?php echo $university['university_name']; ?>"  class="form-control" name="university_name" placeholder="University Name">
        </div>
    </div>
    
    Address
    <div class="form-group row">
        <div class="col-sm-8 mb-3 mb-sm-0">
            <input type="text"  value="<?php echo $university['address']; ?>"  class="form-control" name="address" placeholder="Address">
        </div>
    </div>

    Year Founded
    <div class="form-group row">
        <div class="col-sm-8 mb-3 mb-sm-0">
            <input type="text"  value="<?php echo $university['year_founded']; ?>"  class="form-control" name="year_founded" placeholder="Year Founded">
        </div>
    </div>
    

    Description
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <textarea style="resize:none" name="description"  rows="15" class="form-control" placeholder="Description"><?php echo $university['description']; ?></textarea>
        </div>
    </div>

    Vision
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <textarea style="resize:none" name="vision"  rows="15" class="form-control" placeholder="Vision"><?php echo $university['vision']; ?></textarea>
        </div>
    </div>

    Mission
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <textarea style="resize:none" name="mission"  rows="15" class="form-control" placeholder="Mission"><?php echo $university['mission']; ?></textarea>
        </div>
    </div>
    
    <button type="submit" name="updateUniversityInfo" class="btn btn-primary btn-user">
        Submit Information
    </button>
</form>
