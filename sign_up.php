<?php
session_start();
include 'include/conn.php';


if(isset($_POST['register'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$mobile = $_POST['number'];
	$password = $_POST['password'];

	$insert = "INSERT INTO `user` ( `username`, `email`, `mobile`, `password`) VALUES('$username', '$email', '$mobile', '$password')";

	$query = mysqli_query($con, $insert);
	//$check_email = mysqli_num_rows($con, $query);

	//Check Email are exist//
	/*if($check_email==1){
		echo "<script>alert('Your Email Alreay Exist')</script>";
	}*/

	if($query){
		echo "<script>alert('Your Registration Successfull')</script>";
		//header("location: register.php");
		echo "<script> location.href='register.php'</script>";
		exit();
	}else{
		echo "Registration Failed";
	}
}

?>