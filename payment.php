<?php
session_start();

include 'include/conn.php';

$total = 0;
$allItems = '';
$items = array();

$sql = "SELECT CONCAT(product_name , '(', qty, ')') AS itemQty, total_price FROM cart";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
	$total +=$row['total_price'];
	$items[] = $row['itemQty'];
}
//print_r($items);

$allItems = implode(", ",  $items);
///echo $allItems;

/*--=====================Send Payment Detailes=========================--*/
if(isset($_POST['send_detailes'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$products = $_POST['products'];
	$total = $_POST['total'];
	$address = $_POST['address'];
	$pmode = $_POST['pmode'];
	$uid = $_SESSION['user_id'];

	
	//die();

	$insert = "INSERT INTO `orders` ( `name`, `user_id`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`) VALUES ( '$name', '$uid', '$email', '$phone', '$address', '$pmode', '$products', '$total')";

	$query = mysqli_query($con, $insert);

	if($query){
		header('location: success.php');
	}else{
		echo "<script> alert('Your Order has been Failed'); </script>";
	}


}



?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <title>Payment</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-lg-6 px-4 pb-4 " id="order">
			<h4 class="text-center text-success p-2">Complete Your Order</h4>
			<div class="jumbotron p-3 mb-2 text-center bg-secondary">
				<h6 class="lead text-white"><b>Products : </b><?= $allItems; ?></h6>
				<h6 class="lead text-white"><b>Delivery Charge : </b>Free</h6>
				<h5 class="text-white"><b>Total Amount Payable : </b><?= number_format($total, 2); ?>/-</h5>
			</div>
			<form action="" method="post" id="placeOrder">
				<input type="hidden" name="products" value="<?= $allItems; ?>">
				<input type="hidden" name="total" value="<?= $total; ?>">

				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Enter Your Name" required="">
				</div>
				<div class="form-group mt-2">
					<input type="email" name="email" class="form-control" placeholder="Enter Your Email" required="">
				</div>
				<div class="form-group mt-2">
					<input type="text" name="phone" class="form-control" placeholder="Enter Your Number" required="">
				</div>
				<div class="form-group mt-2">
					<textarea name="address" class="form-control" row="3" cols="10" placeholder="Enter Your Delivery Address" required=""></textarea>
				</div>
				<h6 class="text-center mt-2">Select Payment Mode</h6>
				<div class="form-group">
					<select name="pmode" class="form-control">
						<option value="" selected disabled="">-Select Payment Mode-</option>
						<option value="COD">Cash On Delivery</option>
						<option value="netbanking">Net Banking</option>
						<option value="cards">Debit/Credit Cards</option>
					</select>
				</div>
				<div class="form-group mt-2">
					<input type="submit" value="Place Your Order" class="btn btn-danger btn-block w-100" name="send_detailes">
				</div>
			</form>
		</div>
	</div>
</div>
<?php include 'include/footer_link.php'; ?>
<!--script type="text/javascript">
	$(document).ready(function(){
		$('#placeOrder').submit(function(e){
			e.preventDefault();
			$.ajax({
				url: 'action.php',
				method: 'post',
				data: $('form').serialize() + "&action=order",
				success: function(response){
					$('#order').html(response);
				};
			});
		});
	});
</script-->