<?php 
		include('../core/session.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Dashboard</title>

	<!-- Custom fonts for this template-->
	<link href="../assets/fontawesome/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

	 <!-- Custom styles for DataTables -->
	 <link href="../assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">
	<!-- Bootstrap core JavaScript-->
	<script src="../assets/jquery/jquery.min.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script> 

	<!-- Custom scripts for all pages-->
	<script src="../assets/js/sb-admin-2.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../assets/jquery-easing/jquery.easing.min.js"></script>


	<!-- Page level plugins -->
	<script src="../assets/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="../assets/js/demo/datatables-demo.js"></script>
	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Calling sidebar.php -->
		<?php include'./sidebar.php' ?>

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Calling topbar.php -->
				<?php include'./topbar.php'?>

				<!-- Begin Page Content -->
				<div class="container-fluid">
					<?php
					if(isset($_GET['page']))
					{
						$page = $_GET['page'];

						switch ($page)
						{
							case 'ReportDetails':
								include "./Report/viewdetails.php";
								break;
							case 'Report':
								include "./Report/view.php";
								break;
							case 'V_News':
								include "../studentpages/view.php";
								break;
							case 'news':
								include "../studentpages/news.php";
								break;
							case 'timetable':
								include "../studentpages/timetable.php";
								break;
							case 'UniversityForm':
								include "./University/form.php";
								break;	
							case 'NewsForm':
								include "./News/form.php";
								break;		
							case 'L_News':
								include "./News/view_list.php";
								break;
							case 'NewsCategoryForm':
								include "./News/category_form.php";
								break;
							case 'L_News_Category':
								include "./News/list_category.php";
								break;
							case 'StudentForm':
								include "./Student/form.php";
								break;
							case 'L_Student':
								include "./Student/view_list.php";
								break;
							case 'LecturerForm':
								include "./Lecturer/form.php";
								break;
							case 'L_Lecturer':
								include "./Lecturer/view_list.php";
								break;
							case 'StudentScheduleForm':
								include "./StudentSchedule/form.php";
								break;
							case 'L_Student_Schedule':
								include "./StudentSchedule/view_list.php";
								break;
							case 'ScheduleForm':
								include "./Schedule/form.php";
								break;
							case 'L_Schedule':
								include "./Schedule/view_list.php";
								break;
							case 'ClassroomForm':
								include "./Classroom/form.php";
								break;
							case 'L_Classroom':
								include "./Classroom/view_list.php";
								break;
							case 'SubjectForm':
								include "./Subject/form.php";
								break;
							case 'L_Subject':
								include "./Subject/view_list.php";
								break;
							case 'ReligionForm':
								include "./Religion/form.php";
								break;
							case 'L_Religion':
								include "./Religion/view_list.php";
								break;
							case 'SemesterForm':
								include "./Semester/form.php";
								break;
							case 'L_Semester':
								include "./Semester/view_list.php";
								break;            
							case 'FacultyForm':
								include "./Faculty/form.php";
								break;
							case 'L_Faculty':
								include "./Faculty/view_list.php";
								break;
							default:
								echo "<center><h3>404 | Not Found</h3></center>";
								break;
						}
					}
					else
					{
						// include "../404.html";
					}
					?>
						
				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Calling footer.php -->
			<?php include'./footer.php'?>
			
		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	


	<!-- Page level plugins -->
	<!-- <script src="vendor/chart.js/Chart.min.js"></script> -->
</body>

</html>
