<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of Classroom</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Classroom</th>
                <th>Capacity</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Classroom</th>
                <th>Capacity</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
        <?php 
            $select = "SELECT * FROM tb_classroom";
            $exec = mysqli_query($con,$select);
            if(mysqli_num_rows($exec)==0)
            {
                echo "<tr> <td colspan='3'> <center>Sorry! There is no data in the database now.</center> </td> </tr>";
            }
            else
            {
                while($data = mysqli_fetch_array($exec))
                {
                  $id = $data['id'];
                  $classroom = $data['classroom'];
                  $capacity = $data['capacity'];
        ?>
            <tr>
                <td> <?php echo $classroom; ?></td>
                <td> <?php echo $capacity; ?></td>
                <td class="text-center"> <a href="dashboard.php?page=ClassroomForm&id=<?php echo $id; ?>" class="btn btn-primary btn-block">Edit</button></td>
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

