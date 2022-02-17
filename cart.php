<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
           
            <div class="table-responsive mt-5">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                        <td colspan="7">
                            <h4 class="text-center text-success m-0">Products in your carts</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>qty</th>
                        <th>Total Price</th>
                        <th>
                            <a href="action.php?clear=all" onclick="return confirm('Are you sure want to clear your cart');" class="badge-danger badge p-1 bg-danger" style="text-decoration: none; color: #fff;"><i class="fas fa-trash"></i>&nbsp;Clear Cart</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        session_start();

                            include 'include/conn.php';
                            $uid = $_SESSION['user_id'];

                            $select = "SELECT * FROM cart WHERE user_id=$uid";
                            $query = mysqli_query($con, $select);
                            $total = 0;
                            while($row = mysqli_fetch_assoc($query)){
                        ?>
                        <tr>
                            <td><?= $row['id'];?></td>
                            <input type="hidden" class="pid" value="<?= $row['id'];?>" name="">

                            <td><img src="<?= $row['product_image']; ?>" width="90" height="90">
                            </td>
                            <td><?= $row['product_name'];?></td>

                            <td><i class="fas fa-rupee-sign"></i>&nbsp;<?= number_format($row['product_price'], 2); ?></td>
                            <input type="hidden" class="pprice" value="<?= $row['product_price']; ?>" name="">

                            <td><input type="number" class="form-control itemQty" value="<?= $row['qty'];?>" style="width: 75px;"></td>

                            <td><i class="fas fa-rupee-sign"></i>&nbsp;<?= number_format($row['total_price'], 2); ?></td>

                            <td>
                                <a href="action.php?remove=<?= $row['id'];?>" class="text-danger lead" onclick="return confirm('Are You sure want to remove this item');"><i class="fas fa-trash-alt "></i></a>

                            </td>
                        </tr>
                        <?php $total += $row['total_price']; ?>
                    <?php } ?>
                    <tr>
                        <td colspan="3">
                            <a href="index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
                        </td>
                        <td colspan="2">
                            <b>Grand Total</b>
                        </td>
                         <td><b><i class="fas fa-rupee-sign"></i>&nbsp;<?= number_format($total, 2); ?></b></td>
                         <td>
                             <a href="payment.php" class="btn btn-danger <?= ($total>1)?"":"disabled";?>"><i class="fas fa-credit-card"></i>&nbsp;Checkout</a>
                         </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>




<?php include 'include/footer_link.php' ?>