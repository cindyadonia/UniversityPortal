<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of Religion</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Semester Code</th>
                <th>Semester</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Semester Code</th>
                <th>Semester</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
        <?php 
            $select = "SELECT * FROM tb_semester";
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
                  $code = $data['semester_code'];
                  $semester = $data['semester'];
        ?>
            <tr>
                <td> <?php echo $code; ?></td>
                <td> <?php echo $semester; ?></td>
                <td class="text-center"> <a href="dashboard.php?page=SemesterForm&id=<?php echo $id; ?>" class="btn btn-primary btn-block">Edit</button></td>
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

