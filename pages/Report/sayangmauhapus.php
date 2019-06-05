<!-- DataTables Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail Information about Schedule</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Semester</th>
                <th>Lecturer</th>
                <th>Classroom</th>
                <th>Day and Time</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Semester</th>
                <th>Lecturer</th>
                <th>Classroom</th>
                <th>Day and Time</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
        <?php 
            $select = "SELECT tb_subject_schedule.id, tb_subject.subject_code, tb_subject.subject_name, tb_semester.semester, tb_lecturer.name as lecturer_name, tb_classroom.classroom, CONCAT(tb_time.day,' ', tb_time.time) as date FROM tb_subject_schedule
			INNER JOIN tb_subject on tb_subject.id = tb_subject_schedule.subject_id
			INNER JOIN tb_semester on tb_semester.id = tb_subject.semester_id
			INNER JOIN tb_lecturer on tb_lecturer.id = tb_subject.lecturer_id
			INNER JOIN tb_time on tb_time.id = tb_subject_schedule.time_id
			INNER JOIN tb_classroom on tb_classroom.id = tb_subject_schedule.classroom_id";
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
                  $subject_code = $data['subject_code'];
				  $subject_name = $data['subject_name'];
                  $semester = $data['semester'];
                  $lecturer_name = $data['lecturer_name'];
                  $classroom = $data['classroom'];
                  $date = $data['date'];
        ?>
            <tr>
                <td> <?php echo $subject_code; ?></td>
                <td> <?php echo $subject_name; ?></td>
                <td> <?php echo $semester; ?></td>
                <td> <?php echo $lecturer_name; ?></td>
                <td> <?php echo $classroom; ?></td>
                <td> <?php echo $date; ?></td>
                <td class="text-center"> <a href="dashboard.php?page=ReportDetails&id=<?php echo $id; ?>" class="btn btn-primary btn-block" >View</button></td>
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

<table style="border: 1px solid black;border-collapse: collapse;">
<?php 
    include'../core/config.php';

    $id = $_GET['id'];

    $query="SELECT tb_students.student_no, tb_students.name as student_name, tb_students_schedule.id, tb_subject_schedule.id, tb_subject.subject_name, tb_lecturer.name as lecturer_name FROM tb_students
    INNER JOIN tb_students_schedule on tb_students_schedule.student_id = tb_students.id
    INNER JOIN tb_subject_schedule on tb_subject_schedule.subject_id = tb_students_schedule.subject_id
    INNER JOIN tb_subject on tb_subject.id = tb_subject_schedule.subject_id
    INNER JOIN tb_lecturer on tb_lecturer.id = tb_subject.lecturer_id
    WHERE tb_subject_schedule.id = '$id'";

    $sql = mysqli_query($con,$query);
	$i = 0;
    while($data = mysqli_fetch_array($sql))
    {
		$i++;
        $student_no = $data['student_no'];
        $student_name = $data['student_name'];
?>
    <tr>
		<td> <?php echo $i; ?></td>
        <td> <?php echo $student_no; ?></td>
        <td> <?php echo $student_name; ?></td>
    </tr>
	<?php
	}
	?>
</table>