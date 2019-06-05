<?php
	include('../core/config.php');
	
?>
<h1 class="h3 mb-2 text-gray-800">My Time Table</h1>
<!-- <p class="mb-4">My Schedule</p> -->
<table class="table table-bordered">
	<thead>
		<tr>
		<th scope="col">Subject Name</th>
		<th scope="col">Semester</th>
		<th scope="col">Classroom</th>
		<th scope="col">Day and Time</th>
		<th scope="col">Credit</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$select = "SELECT tb_subject.subject_name, tb_semester.semester, tb_classroom.classroom, CONCAT(tb_time.day,' ',tb_time.time) as date, tb_subject.credits FROM tb_students_schedule
			INNER JOIN tb_subject on tb_subject.id = tb_students_schedule.subject_id
			INNER JOIN tb_subject_schedule on tb_subject_schedule.subject_id = tb_subject.id
			INNER JOIN tb_classroom on tb_classroom.id = tb_subject_schedule.classroom_id
			INNER JOIN tb_time on tb_time.id = tb_subject_schedule.time_id
			INNER JOIN tb_semester on tb_semester.id = tb_subject.semester_id
			where tb_students_schedule.student_id ='$user_id' AND tb_subject.semester_id='$semester';";

			$query = mysqli_query($con,$select);
			if(mysqli_num_rows($query)==0)
            {
                echo "<tr> <td colspan='5'> <center>You dont have any schedule for now.</center> </td> </tr>";
            }
            else
            {
                while($data = mysqli_fetch_array($query))
                {
				  $subject_name = $data['subject_name'];
                  $semester = $data['semester'];
                  $classroom = $data['classroom'];
				  $date = $data['date'];
				  $credits = $data['credits'];

		?>
		<tr>
			<td><?php echo $subject_name;?></td>
			<td><?php echo $semester;?></td>
			<td><?php echo $classroom;?></td>
			<td><?php echo $date;?></td>
			<td><?php echo $credits;?></td>
		</tr>
		<?php
				}
			}
		?>
		<th colspan="4">Total Credits</th>
		<th>
		<?php 
			$select = "SELECT SUM(tb_subject.credits) as total from tb_subject
			INNER JOIN tb_students_schedule on tb_students_schedule.subject_id = tb_subject.id
			WHERE tb_students_schedule.student_id = '$user_id' and tb_subject.semester_id = '".$_SESSION['semester']."'";
			$exec = mysqli_query($con,$select);
			$tampung = mysqli_fetch_array($exec);
			$total = $tampung["total"];
			echo $total;
		?>
		</th>
	</tbody>
</table>