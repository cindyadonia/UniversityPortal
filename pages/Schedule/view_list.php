<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of Subject</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Classroom</th>
                <th>Day</th>
                <th>Time</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Subject</th>
                <th>Classroom</th>
                <th>Day</th>
                <th>Time</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
        <?php 
            $select = "SELECT tb_subject_schedule.id, tb_subject.subject_name, tb_classroom.classroom, tb_time.day, tb_time.time FROM tb_subject_schedule
            INNER JOIN tb_subject on tb_subject.id = tb_subject_schedule.subject_id
            INNER JOIN tb_classroom on tb_classroom.id = tb_subject_schedule.classroom_id
            INNER JOIN tb_time on tb_time.id = tb_subject_schedule.time_id";
            $exec = mysqli_query($con,$select);
            if(mysqli_num_rows($exec)==0)
            {
                echo "<tr> <td colspan='5'> <center>Sorry! There is no data in the database now.</center> </td> </tr>";
            }
            else
            {
                while($data = mysqli_fetch_array($exec))
                {
                  $id = $data['id'];
                  $subject = $data['subject_name'];
                  $classroom = $data['classroom'];
                  $day = $data['day'];
                  $time = $data['time'];
        ?>
            <tr>
                <td> <?php echo $subject; ?></td>
                <td> <?php echo $classroom; ?></td>
                <td> <?php echo $day; ?></td>
                <td> <?php echo $time; ?></td>
                <td class="text-center"> <a href="dashboard.php?page=ScheduleForm&id=<?php echo $id; ?>" class="btn btn-primary btn-block">Edit</button></td>
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

