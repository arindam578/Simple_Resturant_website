<?php
session_start();

include 'include/conn.php';

/*--=====================Insert Product Detailes=========================--*/
if(isset($_POST['pid'])){
	$pid = $_POST['pid'];
	$pname = $_POST['pname'];
	$pprice = $_POST['pprice'];
	$pimage = $_POST['pimage'];
	$pcode = $_POST['pcode'];
	$pqty = 1; //Here is send to by default 1 add to cart//
	$uid = $_SESSION['user_id'];

	$check_pcode = "SELECT * FROM cart WHERE id=$pid AND user_id=$uid";
	$q = mysqli_query($con, $check_pcode);
	$run = mysqli_num_rows($q); 
			if($run==1){
				echo "<script> alert('alreday add'); </script>";
				exit();
			}
	
		$insert = "INSERT INTO `cart` ( `product_name`, `user_id`, `product_price`, `product_image`, `qty`, `total_price`, `product_code`) VALUES ('$pname', '$uid', '$pprice', '$pimage', '$pqty', '$pprice', '$pcode')";

		$query = mysqli_query($con, $insert);

		if($query){
			echo "<script> swal('Yeah!', 'Product add in your cart', 'success');</script>";
		}else{
			echo "<script> alert('product add unsuccessfull!'); </script>";
		}
}
/*--=====================Insert Product Detailes end=========================--*/

/*--===================== Fetch All Cart Item==========================--*/
if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){

	$select = "SELECT * FROM cart";
	$query = mysqli_query($con, $select);
	$rows = mysqli_num_rows($query);

	echo $rows;
}

/*--=====================Remove A single Item=========================--*/
if(isset($_GET['remove'])){
	$id = $_GET['remove'];

	$delete = "DELETE FROM cart WHERE id=$id";
	$query = mysqli_query($con, $delete);

	$_SESSION['showAlert'] = 'block';
	$_SESSION['message'] = 'Item remove from your cart';
	header('location: cart.php');
}

/*--=====================Remove All Item===============================--*/
if(isset($_GET['clear'])){
	$delete = "DELETE FROM cart";
	$query = mysqli_query($con, $delete);

	if($query){
		echo "<script> alert('All Products Remove From Your Cart'); </script>";
		header('location: cart.php');
	}
}

/*--=====================Send Payment Detailes=========================--*/
/*if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$products = $_POST['products'];
	$total = $_POST['total'];
	$address = $_POST['address'];
	$pmode = $_POST['pmode'];
	$uid = $_SESSION['user_id'];

	$data = '';

	$insert =$con->prepare("INSERT INTO orders(name, user_id, email, phone, address, pmode, products, amount_paid) VALUES(?,?,?,?,?,?,?,?)");

	$insert->bind_param("ssssssss", $name, $email, $phone, $address, $pmode, $products, $total);

	$insert->execute();

	$data .= '<div class="text-center">
				<h1 class="text-success">Thanks for your order</h1>
			<div>';


}*/
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>