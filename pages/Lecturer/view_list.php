<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of Lecturer</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Lecturer No</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Faculty</th>
            <th>Religion</th>
            <th> </th>
          </tr>
        </thead>
        <tfoot>
            <th>Name</th>
            <th>Lecturer No</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Faculty</th>
            <th>Religion</th>
            <th> </th>
        </tfoot>
        <tbody>
            <?php
            $select = "SELECT tb_lecturer.id, name, lecturer_no, birth_date, gender, tb_faculty.faculty_name, tb_religion.religion FROM tb_lecturer
            INNER JOIN tb_faculty on tb_faculty.id = tb_lecturer.faculty_id
            INNER JOIN tb_religion on tb_religion.id = tb_lecturer.religion_id";
            $exec = mysqli_query($con,$select);
            if(mysqli_num_rows($exec)==0)
            {
                echo "<tr> <td colspan='7'><center> Sorry there is no data found in the database now. </td> </tr>";
            }
            else
            {
                while($data = mysqli_fetch_array($exec))
                {
                  $id = $data['id'];
                  $name = $data['name'];
                  $lecturer_no = $data['lecturer_no'];
                  $birthdate = $data['birth_date'];
                  $gender = $data['gender'];
                  $faculty = $data['faculty_name'];
                  $religion = $data['religion']
            ?>
            <tr>
                <td> <?php echo $name;?> </td>
                <td> <?php echo $lecturer_no;?> </td>
                <td> <?php echo $birthdate;?> </td>
                <td> <?php echo $gender;?> </td>
                <td> <?php echo $faculty;?> </td>
                <td> <?php echo $religion;?> </td>
                <td class="text-center"> <a href="dashboard.php?page=LecturerForm&id=<?php echo $id; ?>" class="btn btn-primary btn-block">Edit</button></td>
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

