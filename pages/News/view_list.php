<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of News</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Date Created</th>
                <th>News Category</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Date Created</th>
                <th>News Category</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
        <?php 
            $select = "SELECT tb_news.id, title, content, date_created, tb_news_category.news_category from tb_news
            INNER JOIN tb_news_category on tb_news_category.id = tb_news.news_category_id";
            $exec = mysqli_query($con,$select);
            if(mysqli_num_rows($exec)==0)
            {
                echo "<tr> <td colspan='4'> <center>Sorry! There is no data in the database now.</center> </td> </tr>";
            }
            else
            {
                while($data = mysqli_fetch_array($exec))
                {
                    $id = $data['id'];
                    $title = $data['title'];
                    $content = $data['content'];
                    $date_created = $data['date_created'];
                    $news_category = $data['news_category'];
        ?>
            <tr>
                <td> <?php echo $title; ?></td>
                <td> <?php
                if (strlen($content) > 10)
                    $content = substr($content, 0, 30) . '...';
                echo $content;
                ?></td>
                <td> <?php echo $date_created; ?></td>
                <td> <?php echo $news_category ; ?></td>
                <td class="text-center"> <a href="dashboard.php?page=NewsForm&id=<?php echo $id; ?>" class="btn btn-primary btn-block">Edit</button></td>
            </tr>
        <?php
                }
            }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

