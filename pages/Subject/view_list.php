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
                <th>Subject No</th>
                <th>Faculty</th>
                <th>Semester</th>
                <th>Lecturer</th>
                <th>Credits</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Subject</th>
                <th>Subject No</th>
                <th>Faculty</th>
                <th>Semester</th>
                <th>Lecturer</th>
                <th>Credits</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
        <?php 
            $select = "SELECT tb_subject.id, subject_name, subject_code, tb_faculty.faculty_name, tb_semester.semester, tb_lecturer.name, credits FROM tb_subject
            INNER JOIN tb_faculty on tb_faculty.id = tb_subject.faculty_id
            INNER JOIN tb_semester on tb_semester.id = tb_subject.semester_id
            INNER JOIN tb_lecturer on tb_lecturer.id = tb_subject.lecturer_id";
            $exec = mysqli_query($con,$select);
            if(mysqli_num_rows($exec)==0)
            {
                echo "<tr> <td colspan='7'> <center>Sorry! There is no data in the database now.</center> </td> </tr>";
            }
            else
            {
                while($data = mysqli_fetch_array($exec))
                {
                  $id = $data['id'];
                  $subject = $data['subject_name'];
                  $code = $data['subject_code'];
                  $faculty = $data['faculty_name'];
                  $semester = $data['semester'];
                  $lecturer = $data['name'];
                  $credits = $data['credits'];
        ?>
            <tr>
                <td> <?php echo $subject; ?></td>
                <td> <?php echo $code; ?></td>
                <td> <?php echo $faculty; ?></td>
                <td> <?php echo $semester; ?></td>
                <td> <?php echo $lecturer; ?></td>
                <td> <?php echo $credits; ?></td>
                <td class="text-center"> <a href="dashboard.php?page=SubjectForm&id=<?php echo $id; ?>" class="btn btn-primary btn-block">Edit</button></td>
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

