<?php
	include('../core/config.php');
	$news_id = false;
	if(isset($_GET["news_id"]))
	{
		$news_id=$_GET["news_id"];
	}

	$select = "SELECT tb_news.*, tb_news_category.news_category FROM tb_news
	INNER JOIN tb_news_category on tb_news_category.id = tb_news.news_category_id where tb_news.id = '$news_id'";
	$exec = mysqli_query($con,$select);
	// $data = mysqli_fetch_array($con,$exec);
	$tampung = mysqli_fetch_array($exec);
	$title = $tampung['title'];
	$content = $tampung['content'];
	$news_category = $tampung['news_category'];
	$date = $tampung['date_created'];
	
	
?>


<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h2 class="m-0 font-weight-bold text-primary"><?php echo $title;?></h2>
		<h6> <?php echo $news_category ."<br> Date Created: ". $date;?></h6>
	</div>
	<div class="card-body">
		<p><?php echo $content?></p>
	</div>
	<div class="card-footer">
		<a href="dashboard.php?page=news" class="btn btn-primary">Back</a>
	</div>
</div>	


