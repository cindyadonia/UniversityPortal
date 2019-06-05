<?php
if($role==2)
{
  include('../core/university.php');

  $university = getUniversityInfo();
}
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-pencil-ruler "></i>
  </div>
  <div class="sidebar-brand-text mx-3">Dashboard</div>  
</a>

<?php if($role=='2'):?>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Information
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="dashboard.php?page=news">
    <i class="fas fa-fw fa-newspaper"></i>
    <span>News</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="dashboard.php?page=timetable">
    <i class="fas fa-fw fa-calendar-alt"></i>
    <span>Time Table</span></a>
</li>

<!-- Nav Item - University -->
<!-- <li class="nav-item">
  <a class="nav-link">
    <i class="fas fa-fw fa-university"></i>
    <span>University</span></a>
</li> -->

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  University Information
</div>

<div style="width: 14rem; color:#bbe0f6">
<div class="card-body">
    <h5 class="card-title"><?php echo $university['university_name'];?></h5>
    <p class="card-text" style="font-size:11px">
    	<?php echo $university['address'];?><br>
    	Year Founded : <?php echo $university['year_founded'];?>
    </p>

    <p class="card-text" style="font-size:11px">
		<?php echo $university['description'];?>
    </p>

	<div style="font-size:14px">Vision : </div>
	<p class="card-text" style="font-size:11px">
		<?php echo $university['vision'];?>
	</p>
    
	<div style="font-size:14px">Mission : </div>
	<p class="card-text" style="font-size:11px">
      <?php echo $university['mission'];?>
    </p>
	
	</div>
</div>
<?php endif; ?>




<?php if($role=='1'):?>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Information
</div>

<!-- Nav Item - University -->
<li class="nav-item">
  <a class="nav-link" href="dashboard.php?page=UniversityForm">
    <i class="fas fa-fw fa-university"></i>
    <span>University</span></a>
</li>

<!-- Nav Item - Report -->
<li class="nav-item">
  <a class="nav-link" href="dashboard.php?page=Report">
    <i class="fas fa-fw fa-file-invoice "></i>
    <span>Report</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Heading -->
<div class="sidebar-heading">
  Manage Data
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageNews" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-newspaper"></i>
    <span>News</span>
  </a>
  <div id="manageNews" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="dashboard.php?page=NewsForm">Add News</a>
      <a class="collapse-item" href="dashboard.php?page=L_News">List News</a>
    </div>
  </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageStudent" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-user"></i>
    <span>Student</span>
  </a>
  <div id="manageStudent" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="dashboard.php?page=StudentForm">Add Student</a>
      <a class="collapse-item" href="dashboard.php?page=L_Student">List Student</a>
    </div>
  </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageLecturer" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-user-tie"></i>
    <span>Lecturer</span>
  </a>
  <div id="manageLecturer" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="dashboard.php?page=LecturerForm">Add Lecturer</a>
      <a class="collapse-item" href="dashboard.php?page=L_Lecturer">List Lecturer</a>
    </div>
  </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageSchedule" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-calendar-alt"></i>
    <span>Schedule</span>
  </a>
  <div id="manageSchedule" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Student Schedule:</h6>
      <a class="collapse-item" href="dashboard.php?page=StudentScheduleForm">Add Student Schedule</a>
      <a class="collapse-item" href="dashboard.php?page=L_Student_Schedule">List of Student Schedule</a>
      <div class="collapse-divider"></div>
      <h6 class="collapse-header">Subject Schedule:</h6>
      <a class="collapse-item" href="dashboard.php?page=ScheduleForm">Add Schedule</a>
      <a class="collapse-item" href="dashboard.php?page=L_Schedule">List of Schedule</a>
    </div>
  </div>
</li>

<!-- Nav Item -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageClass" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-school"></i>
    <span>Classroom</span>
  </a>
  <div id="manageClass" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="dashboard.php?page=ClassroomForm">Add Classroom</a>
      <a class="collapse-item" href="dashboard.php?page=L_Classroom">List Classroom</a>
    </div>
  </div>
</li>

<!-- Nav Item -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageSubject" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-book"></i>
    <span>Subject</span>
  </a>
  <div id="manageSubject" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="dashboard.php?page=SubjectForm">Add Subject</a>
      <a class="collapse-item" href="dashboard.php?page=L_Subject">List Subject</a>
    </div>
  </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Heading -->
<div class="sidebar-heading">
  Categories
</div>

<!-- Nav Item -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageReligion" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-praying-hands"></i>
    <span>Religion</span>
  </a>
  <div id="manageReligion" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="dashboard.php?page=ReligionForm">Add Religion</a>
      <a class="collapse-item" href="dashboard.php?page=L_Religion">List Religion</a>
    </div>
  </div>
</li>

<!-- Nav Item -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageSemester" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-archive"></i>
    <span>Semester</span>
  </a>
  <div id="manageSemester" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="dashboard.php?page=SemesterForm">Add Semester</a>
      <a class="collapse-item" href="dashboard.php?page=L_Semester">List Semester</a>
    </div>
  </div>
</li>

<!-- Nav Item -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageNewsCategory" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-newspaper"></i>
    <span>News</span>
  </a>
  <div id="manageNewsCategory" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="dashboard.php?page=NewsCategoryForm">Add News Category</a>
      <a class="collapse-item" href="dashboard.php?page=L_News_Category">List News Category</a>
    </div>
  </div>
</li>

<!-- Nav Item -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageFaculty" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-university"></i>
    <span>Faculty</span>
  </a>
  <div id="manageFaculty" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="dashboard.php?page=FacultyForm">Add Faculty</a>
      <a class="collapse-item" href="dashboard.php?page=L_Faculty">List Faculty</a>
    </div>
  </div>
</li>

<?php endif; ?>

<!-- Sidebar Toggler (Sidebar) -->
<!-- <div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div> -->

</ul>
<!-- End of Sidebar -->
