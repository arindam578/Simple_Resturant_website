<?php
session_start();
include 'include/conn.php';


if(isset($_POST['submit'])){
	/*echo "<pre>";
	print_r($_POST);die;*/
	$name = $_POST['name'];
	$number = $_POST['number'];
	$date = $_POST['date'];
	//$food = $_POST['food'];
	$email = $_POST['email'];
	$person = $_POST['person'];
	$time = $_POST['time'];
	$occasion = $_POST['occasion'];
	$uid = $_SESSION['user_id'];

	$insert = "INSERT INTO `table_booking` (`name`, `user_id`, `number`, `date`, `email`, `person`, `time`, `occasion`) VALUES ('$name', '$uid', '$number', '$date', '$email', '$person', '$time', '$occasion')";

	$query = mysqli_query($con, $insert);
	if($query){
		echo "<script> alert('Your Table Booking has been Successfully');</script>";
		echo "<script> location.href='booking.php'; </script>";
	}else{
		echo "error";
	}
}

?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>