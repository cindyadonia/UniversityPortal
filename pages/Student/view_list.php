<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of Student</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Student No</th>
            <th>Birth Date</th>
            <th>Contact No</th>
            <th>Gender</th>
            <th>Faculty</th>
            <th>Current Semester</th>
            <th>Religion</th>
            <th> </th>
          </tr>
        </thead>
        <tfoot>
            <th>Name</th>
            <th>Student No</th>
            <th>Birth Date</th>
            <th>Contact No</th>
            <th>Gender</th>
            <th>Faculty</th>
            <th>Current Semester</th>
            <th>Religion</th>
            <th> </th>
        </tfoot>
        <tbody>
            <?php
            $select = "SELECT tb_students.id, name, student_no, birth_date, contact_no, gender, tb_faculty.faculty_name, tb_semester.semester, tb_religion.religion FROM tb_students
            INNER JOIN tb_faculty on tb_faculty.id = tb_students.faculty_id
            INNER JOIN tb_semester on tb_semester.id = tb_students.current_semester_id
            INNER JOIN tb_religion on tb_religion.id = tb_students.religion_id";
            $exec = mysqli_query($con,$select);
            if(mysqli_num_rows($exec)==0)
            {
                echo "<tr> <td colspan='8'><center> Sorry there is no data found in the database now. </td> </tr>";
            }
            else
            {
                while($data = mysqli_fetch_array($exec))
                {
                  $id=$data['id'];
                  $name = $data['name'];
                  $student_no = $data['student_no'];
                  $birthdate = $data['birth_date'];
                  $contact_no = $data['contact_no'];
                  $gender = $data['gender'];
                  $faculty = $data['faculty_name'];
                  $semester = $data['semester'];
                  $religion = $data['religion'];
	            ?>
            <tr>
                <td> <?php echo $name;?> </td>
                <td> <?php echo $student_no;?> </td>
                <td> <?php echo $birthdate;?> </td>
                <td> <?php echo $contact_no;?> </td>
                <td> <?php echo $gender;?> </td>
                <td> <?php echo $faculty;?> </td>
                <td> <?php echo $semester;?> </td>
                <td> <?php echo $religion;?> </td>
                <td>
                  <a href="dashboard.php?page=StudentForm&id=<?php echo $id; ?>" class="btn btn-primary btn-block">Edit</button>
                </td>
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