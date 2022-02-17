<?php
session_start();
include 'include/conn.php';

if(isset($_REQUEST['email_id']) || isset($_REQUEST['pass'])){
	$email = $_REQUEST['email_id'];
	$pass= $_REQUEST['pass'];

	$email = mysqli_real_escape_string($con, $email);
	$pass = mysqli_real_escape_string($con, $pass);

	$query = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
	$result = mysqli_query($con, $query);
	$rows = mysqli_fetch_array($result);

	if($rows){
		  $_SESSION['email'] = $rows['email'];
	      //$_SESSION['pass'] = $pass;
	      $_SESSION['user_id'] = $rows['id'];
		  echo "<script>alert('Your Login has been Succesfull', 'success')</script>";
	      echo "<script> location.href='index.php'</script>";
	}else{
		echo "<script>alert('Your Email or Password do not Match')</script>";
		echo "<script> location.href='register.php'</script>";
	}
}
?>
