<?php 

	// Web
	// $server = "localhost";
	// $user= "utemwebi_1731119";
	// $password="utemwebi_1731119";
	// $db_name ="utemwebi_1731119_portal_univ";

	// Localhost
	$server = "localhost";
	$user= "root";
	$password="";
	$db_name ="db_portal_univ";

	$con = mysqli_connect($server,$user,$password,$db_name);
	if(!$con)
	{
		die("Connection failed! :" . mysqli_connect_error());
	}

	$baseUrl = "http://localhost/portal_univ";
	if ($_SERVER['SERVER_NAME'] == 'localhost') {
		$baseUrl = "http://localhost/portal_univ";
	} else {
		$baseUrl = $_SERVER["HTTP_ORIGIN"];
	}
 ?>