<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of News Category</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>News Category Code</th>
                <th>News Category</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>News Category Code</th>
                <th>News Category</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
        <?php 
            $select = "SELECT * FROM tb_news_category";
            $exec = mysqli_query($con,$select);
            if(mysqli_num_rows($exec)==0)
            {
                echo "<tr> <td colspan='3'> <center>Sorry! There is no data in the database now.</center> </td> </tr>";
            }
            else
            {
                while($data = mysqli_fetch_array($exec))
                {
                  $id=$data['id'];
                  $code = $data['news_category_code'];
                  $news_category = $data['news_category'];
        ?>
            <tr>
                <td> <?php echo $code; ?></td>
                <td> <?php echo $news_category; ?></td>
                <td class="text-center"> <a href="dashboard.php?page=NewsCategoryForm&id=<?php echo $id; ?>"class="btn btn-primary btn-block">Edit</button></td>
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

