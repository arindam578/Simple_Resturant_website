<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

    <!-- Site Metas -->
    <title>Success</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		        <!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style type="text/css">
		body{
			background-image: -moz-linear-gradient( 136deg, rgb(0,158,253) 0%, rgb(42,245,152) 100%);
    		background-image: -webkit-linear-gradient( 136deg, rgb(0,158,253) 0%, rgb(42,245,152) 100%);
    		background-image: -ms-linear-gradient( 136deg, rgb(0,158,253) 0%, rgb(42,245,152) 100%);
		}
	</style>

</head>
<body>

	<?php
		session_start();
		include 'include/conn.php';
			$uid = $_SESSION['user_id'];
			$select = "SELECT * FROM orders WHERE user_id=$uid";
			$query = mysqli_query($con, $select);
			while($row = mysqli_fetch_assoc($query)){
	?>
	<div class="container">
	<div class="text-center">
		<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
		<h2 class="text-success">Your Order Place Sucessfully!</h2>
		<h4 class="bg-danger text-light rounded p-2">Item Purchesd: <?= $row['products'];?><br></h4>
		<h4>Your Name: <?= $row['name'];?></h4>
		<h4>Your Email: <?= $row['email'];?></h4>
		<h4>Your Phone: <?= $row['phone'];?></h4>
		<h4>Total Amount Paid: <?= $row['amount_paid'];?></h4>
		<h4>Payment Mode: <?= $row['pmode'];?></h4>
		 <a href="index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
	</div>
<?php } ?>
</div>

<!-- ALL JS FILES -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>



