<?php 
include ('config.php');

session_start();

if(isset($_POST['login']))
{
	$uname = $_POST['username'];
	$pw = $_POST['password'];

    $sql = "SELECT * FROM tb_users WHERE username='$uname' AND password='$pw'";
	$query = mysqli_query($con, $sql);
	if($query->num_rows > 0){
        while($exec =mysqli_fetch_array($query))
        {
			$has_pwd = $exec['password'];
            $has_id = $exec['username'];
            $role = $exec['role'];
            
            if($role == '2')
            {
                $identity = "SELECT * FROM tb_students where student_no='$uname'";
                $check= mysqli_query($con,$identity);
                if($check->num_rows > 0)
                {
                    while($fetch = mysqli_fetch_array($check))
                    {
                        $name = $fetch['name'];
                        $status = $fetch['account_active'];

                        if($fetch['account_active']==true)
                        {
                            header ('Location: ../pages/dashboard.php');
                            $_SESSION['name'] = $fetch['name'];
                            $_SESSION['gender'] = $fetch['gender'];
                            $_SESSION['role'] = $exec['role'];
                            $_SESSION['user_id'] = $fetch['id'];
                            $_SESSION['username'] = $exec['username'];
                            $_SESSION['semester'] = $fetch['current_semester_id'];
                            $_SESSION["loggedin"]= true;
                        }
                        else
                        {
                            header ('Location: ../index.php');
                        }
                    }
                }
                else
                {
                    header('Location: ../index.php');
                }
            }

            else if($role == '1')
            {
                $identity2 = "SELECT * FROM tb_admins WHERE admin_no='$uname'";
                $check2 = mysqli_query($con,$identity2);
                if($check2->num_rows > 0)
                {
                    while($fetch2 = mysqli_fetch_array($check2))
                    {
                        $name = $fetch2['name'];
                        
                        if($fetch2['account_active']==true)
                        {
                            header ('Location: ../pages/dashboard.php');
                            $_SESSION['name'] = $fetch2['name'];
                            $_SESSION['gender'] = $fetch2['gender'];
                            $_SESSION['role'] = $exec['role'];
                            $_SESSION['user_id'] = $exec['id'];
                            $_SESSION['username'] = $exec['username'];
                            $_SESSION["loggedin"]= true;
                        }
                        else
                        {
                            header ('Location: ../index.php');
                        }
                    }
                    
                }
                else
                {
                    header('Location: ../index.php');
                }
            }

            else
            {
				header('Location: ../index.php');
            }
            
		}
	}
	else{
		header ('Location: ../index.php');
	}
}

 ?>