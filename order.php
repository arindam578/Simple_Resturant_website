<?php 
include 'include/header_link.php';
session_start();
?>

    <div id="loader">
        <div id="status"></div>
    </div>
    <div id="site-header">
        <header id="header" class="header-block-top">
            <div class="container">
                <div class="row">
                    <div class="main-menu">
                        <!-- navbar -->
                        <nav class="navbar navbar-default" id="mainNav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="logo">
                                    <a class="navbar-brand js-scroll-trigger logo-header" href="#">
                                        <!--img src="images/l.png" alt=""-->
                                        <!--h1 style="Color: #fff; font-size: 30px;"><i>Fun n food</i></h1-->
                                    </a>
                                </div>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a href="index.php">Back to home</a></li>
                                    <li class=""><a href="cart.php"><i class="fas fa-shopping-cart"></i><span id="cart_item" class="badge badge-danger"></span></a>
                                    </li>
                                    
                                    
                                </ul>
                            </div>
                            <!-- end nav-collapse -->
                        </nav>
                        <!-- end navbar -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </header>
        <!-- end header -->
    </div>
	<!-- end site-header -->
	
    
    <!-- end banner -->


    <div id="footer" class="footer-main">
        <div class="footer-news pad-top-100 pad-bottom-70 parallax">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="ft-title color-white text-center" style="margin-top: 150px; color: #fff;"> Order Your Favourite Food </h2>
                            
                        </div>
                        <!--form>
                            <input type="email" placeholder="Enter your e-mail id">
                            <a href="#" class="orange-btn"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
                        </form-->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end footer-news -->

</nav>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb"  style="margin-top: 5px; font-size: 30px;">
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Order</li>
  </ol>
</nav>
<!---------------------------Product List Start Here--------------------------->
<div class="container">
    <div id="msg">
        
    </div>
    <div class="row">
        <?php
            include 'include/conn.php';
            $select = "SELECT * FROM product";
            $query = mysqli_query($con, $select);
            while($row = mysqli_fetch_assoc($query)){
        ?>
        <div class="col-lg-3 col-xs-6 col-md-4 mb-2">
            <div class="card-deck">
                <div class="card p-2 border-secondary mb-2">
                    <img src="<?= $row['product_image'];?>" class="card-img-top" style="border-radius: 10px;">
                    <div class="card-body p-1">
                        <h4 class="card-title text-center text-success"><?= $row['product_name'];?></h4>
                        <h5 class="card-text text-center text-danger"><?= number_format($row['product_price'], 2);?>/-</h5>
                    </div>
                    <div class="card-footer p-1">
                        <form action="" method="post" class="from-submit">
                            <input type="hidden" class="pid" value="<?= $row['id']; ?>" name="">
                            <input type="hidden" class="pname" value="<?= $row['product_name']; ?>">
                            <input type="hidden" class="pprice" value="<?= $row['product_price']; ?>">
                            <input type="hidden" class="pimage" value="<?= $row['product_image']; ?>">
                            <input type="hidden" class="pcode" value="<?= $row['product_code']; ?>">
                            <button class="btn btn-danger btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp; Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>
    </div>
</div>
<!---------------------------Product List End Here--------------------------->

<!---------------------------Copyright Section Start------------------------->
    <!-- end reservations-main -->
    <div id="copyright" class="copyright-main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h6 class="copy-title"> Copyright &copy; 2021 Fun n Food is powered by <a href="#" target="_blank"></a> </h6>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
    </div>
<!---------------------------Copyright Section End-------------------------->

    <a href="#" class="scrollup" style="display: none;">Scroll</a>

    <section id="color-panel" class="close-color-panel">
        <a class="panel-button gray2"><i class="fa fa-cog fa-spin fa-2x"></i></a>
        <!-- Colors -->
        <div class="segment">
            <h4 class="gray2 normal no-padding">Color Scheme</h4>
            <a title="orange" class="switcher orange-bg"></a>
            <a title="strong-blue" class="switcher strong-blue-bg"></a>
            <a title="moderate-green" class="switcher moderate-green-bg"></a>
            <a title="vivid-yellow" class="switcher vivid-yellow-bg"></a>
        </div>
    </section>

<?php include 'include/footer_link.php' ?>

<script type="text/javascript">
    $(document).ready(function(){

        $(".itemQty").on('change', function(){
            var $el = $(this).closest('tr');
            var pid = $el.find(".pid").val();
            var pprice = $el.find(".pprice").val();
            var qty = $el.find(".itemQty").val();
            
            
            $.ajax({
                url : 'action.php',
                method: 'post',
                cache: false,
                data: {qty:qty, pid:pid, pprice:pprice},
                success: function(response){
                    console.log(qty);
                    console.log(response);
                }
            });
        });
        
        $(".addItemBtn").click(function(e){
            e.preventDefault();
            var $form = $(this).closest(".from-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();
            var pcode = $form.find(".pcode").val();

            $.ajax({
                url : 'action.php',
                method: 'post',
                data : {pid:pid, pname:pname, pprice:pprice, pimage:pimage, pcode:pcode},
                success: function(response){
                    $("#msg").html(response);
                    load_cart_item_number();
                }
            });
        });

        load_cart_item_number();

        function load_cart_item_number()
        {
            $.ajax({
                url: 'action.php',
                method: 'get',
                data: {cartItem:"cart_item"},
                success: function(response){
                    $("#cart_item").html(response);
                }
            });
        }
    });
</script>
</body>

</html>