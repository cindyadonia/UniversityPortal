<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of Student Schedule</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Student No</th>
                <th>Subject</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Student Name</th>
                <th>Student No</th>
                <th>Subject</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
        <?php 
            $select = "SELECT tb_students_schedule.id, tb_students.name, tb_students.student_no, tb_subject.subject_name FROM tb_students_schedule
            INNER JOIN tb_subject on tb_subject.id = tb_students_schedule.subject_id
            INNER JOIN tb_students on tb_students.id = tb_students_schedule.student_id";
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
                  $name = $data['name'];
                  $student_no = $data['student_no'];
                  $subject = $data['subject_name'];
        ?>
            <tr>
                <td> <?php echo $name; ?></td>
                <td> <?php echo $student_no; ?></td>
                <td> <?php echo $subject; ?></td>
                <td class="text-center"> <a href="dashboard.php?page=StudentScheduleForm&id=<?php echo $id; ?>" class="btn btn-primary btn-block" >Edit</button></td>
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

