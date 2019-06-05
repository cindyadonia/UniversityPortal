<?php
	include('../core/config.php');
?>
<form action="dashboard.php" method="GET">
<input type="hidden" name="page" value="news">
	<div class="row pl-3">
		<div class="col-2">
			<div class="row">
				<div class="col-4">
					<label class="mt-2" for="">Limit:</label>
				</div>
				<div class="col-8">
					<select class="form-control" id="limitSelect" name="limit">
					<?php
						$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
						$page = isset($_GET['pages']) ? $_GET['pages'] : 1;
					?>
						<option value="5" <?php if($limit=='5'){echo 'selected';}else{echo '';}?>>5</option>
						<option value="10" <?php if($limit=='10'){echo 'selected';}else{echo '';}?>>10</option>
						<option value="15" <?php if($limit=='15'){echo 'selected';}else{echo '';}?>>15</option>
						<option value="20" <?php if($limit=='20'){echo 'selected';}else{echo '';}?>>20</option>

					</select>
				</div>
			</div>
		</div>
		<div class="col-2">
			<div class="row">
				<div class="col-4">
					<label class="mt-2" for="">Pages:</label>
				</div>
				<div class="col-8">
					<select class="form-control" id="pagesSelect" name="pages">
						<?php
							$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
							$page = isset($_GET['pages']) ? $_GET['pages'] : 1;
							$count = "SELECT COUNT(id) as total from tb_news";
							$exec = mysqli_query($con,$count);
							$total = mysqli_fetch_array($exec)["total"];
							$j = (ceil(($total / $limit)));
							for($i = 1; $i <= $j; $i++)
							{
						?>
							<option value="<?php echo $i;?>" <?php  if($page == $i){echo "selected";} else{echo '';}?> > <?php echo $i;?></option>
						<?php
							}
						?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<button type="submit" class="d-none" id="btnFilter">Search</button>
</form>

<div class="col-12">
    <?php
		//Cara baca. apakah isset get limit true? kalau true, maka get limitnya. kalau engga maka $limit nilainya 5.
		$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
		$page = isset($_GET['pages']) ? $_GET['pages'] : 1;
		$offseted = ($page-1)*$limit;

		$news_id = false;
		if(isset($_GET["news_id"]))
		{
			$news_id=$_GET["news_id"];
		}

        $news ="SELECT tb_news.*, tb_news_category.news_category FROM tb_news
		INNER JOIN tb_news_category on tb_news_category.id = tb_news.news_category_id LIMIT ".$limit." OFFSET ".$offseted."";
		$exec = mysqli_query($con,$news);
        while($data = mysqli_fetch_array($exec))
        {
			$id = $data['id'];
            $title = $data['title'];
            $date_created = $data['date_created'];
            $news_category = $data['news_category'];
    ?>
    <div class="card mt-1">
        <div class="card-header">
			<a href="dashboard.php?page=V_News&news_id=<?php echo $id;?>" class="font-weight-bold text-dark" name="news">
				<h3><?php echo $title;?></h3>
			</a>
			<i>Category : <?php echo $news_category;?></i>
        </div>
        <!-- <div class="card-body" id="CardBody">
            <p class="card-text custom-p"><?php echo $isi; ?></p>
            <i>Penulis : <?php echo $penulis; ?></i>
        </div> -->
    </div>
    <?php
        }
    ?>
</div>

<script>
	$(document).ready(function(){
		$("#limitSelect").change(function () {
			$("#pagesSelect option[value='1']").attr("selected", "selected");
			$('#btnFilter').click();
		})
		$("#pagesSelect").change(function () {
			$('#btnFilter').click();
		})
		
	});
</script>