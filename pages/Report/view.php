<?php
    require '../core/config.php';
?>
<form class="user" method="GET" action="<?php $_SERVER['PHP_SELF']?>">
	<input type="hidden" name="page" value="Report">
	<div class="form-group row">
		<div class="col-sm-6 mb-3 mb-sm-0">
			<select class="form-control" id="" name="subject_id">
				<option>Select Subject</option>
				<?php 
				$sql ="SELECT tb_subject.id, CONCAT('[', tb_faculty.faculty_name,'] ',tb_subject.subject_name) as subject from tb_subject
				INNER JOIN tb_faculty on tb_faculty.id = tb_subject.faculty_id
				ORDER by tb_faculty.faculty_name ASC";
				$query = mysqli_query($con,$sql);
				while($tampung = mysqli_fetch_array($query))
				{
					$selected = "";
					if (isset($_GET['subject_id']) && $tampung['id'] == $_GET['subject_id'])
					{
						$selected = "selected";
					}
					echo "<option value='".$tampung['id']."' ".$selected.">".$tampung['subject']."</option>";
				}

				?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6 mb-3 mb-sm-0">
			<select class="form-control" id="" name="semester_id">
				<option>Select Semester</option>
				<?php 
				$sql ="SELECT * FROM tb_semester";
				$query = mysqli_query($con,$sql);
				while($tampung = mysqli_fetch_array($query))
				{
					$selected = "";
					if (isset($_GET['semester_id']) && $tampung['id'] == $_GET['semester_id'])
					{
						$selected = "selected";
					}
					echo "<option value='".$tampung['id']."' ".$selected.">".$tampung['semester']."</option>";
				}

				?>
			</select>
		</div>
	</div>
	<button type="submit" class="btn btn-primary btn-user">
        Check Details
    </button>
</form>

<br>
<?php
	if(isset($_GET['subject_id']) && $_GET['subject_id'] != "" && isset($_GET['semester_id']) && $_GET['semester_id'] != "")
	{
		$subject_id = $_GET['subject_id'];
		$semester_id = $_GET['semester_id'];
	
		$query="SELECT tb_subject.subject_code, tb_subject.subject_name, tb_semester.semester, tb_lecturer.name as lecturer_name, tb_classroom.classroom, CONCAT(tb_time.day,' ', tb_time.time) as date, tb_students.student_no, tb_students.name as student_name
		FROM tb_subject_schedule
		INNER JOIN tb_subject on tb_subject.id = tb_subject_schedule.subject_id
		INNER JOIN tb_lecturer on tb_lecturer.id = tb_subject.lecturer_id
		INNER JOIN tb_classroom on tb_classroom.id = tb_subject_schedule.classroom_id
		INNER JOIN tb_time on tb_time.id = tb_subject_schedule.time_id
		INNER JOIN tb_students_schedule on tb_students_schedule.subject_id = tb_subject_schedule.subject_id
		INNER JOIN tb_students on tb_students.id = tb_students_schedule.student_id
		INNER JOIN tb_semester on tb_semester.id = tb_students.current_semester_id
		WHERE tb_subject.id='$subject_id' AND tb_semester.id='$semester_id';";
	
		$searchSql = mysqli_query($con,$query);
		if($searchSql)
		{
			$data = mysqli_fetch_row($searchSql);
			echo "<table>";
			echo "<tr><td>Subject Code</td><td>:</td><td>".$data[0]."</td></tr>";
			echo "<tr><td>Subject Name</td><td>:</td><td>".$data[1]."</td></tr>";
			echo "<tr><td>Semester</td><td>:</td><td>".$data[2]."</td></tr>";
			echo "<tr><td>Lecturer	</td><td>:</td><td>".$data[3]."</td></tr>";
			echo "<tr><td>Classroom</td><td>:</td><td>".$data[4]."</td></tr>";
			echo "<tr><td>Date and Time</td><td>:</td> <td>".$data[5]."</td></tr>";
			echo "</table>";
			echo "<br> <h5>List of student in this subject</h5>";
		}
		else if($searchSql)
		{
			echo "Data not found";
		}	
	}
	


?>
<?php if (isset($searchSql)): ?>
<table class="table table-bordered">
	<tr>
		<th>No </th>
		<th>Student No </th>
		<th>Name</th>
	</tr>
<?php
	$i = 0;
    while($data = mysqli_fetch_array($searchSql))
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
<?php endif; ?>