<?php include 'inc/header.php'; ?>


<?php
	$userid =Session::get('userId');
    $login = Session::get("cuslogin");
    if ($login == false) {
        echo "<script>window.location='login.php';</script>";
    }

 ?>
 <?php 
 	if (isset($_GET['orderId']) && $_GET['orderId'] == 'order') {
 		$query = "SELECT * FROM tbl_booking WHERE usrId = '$userid'";
          $orderData = $db->select($query);
          if ($orderData) {
           while ($result = $orderData->fetch_assoc()) {
           	$pacId = $result['pacId'];
           	$pacName = $result['pacName'];
           	$pacPrice = $result['pacPrice'];
           	$vat = $result['pacPrice'] * 0.03;
           	$totalPrice = $result['pacPrice'] + $vat;
           	$bookDate = $result['bookDate'];

           	$query = "INSERT INTO  tbl_order(usrId, pacId, pacName, pacPrice, bookDate ) VALUES('$userid', '$pacId', '$pacName', '$totalPrice', '$bookDate')";
          $userinsert = $db->insert($query);
      	}
  	  }
	      $delquary = "DELETE FROM tbl_booking WHERE usrId = '$userid'";
	      $delbook = $db->delete($delquary);
	       echo "<script>window.location='successBook.php';</script>";
 	}

 ?>
	<div class="site wrapper-content">
		<div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
			<div class="banner-wrapper container article_heading">
				<div class="breadcrumbs-wrapper">
					<ul class="phys-breadcrumb">
						<li><a href="index-2.html" class="home">Home</a></li>
						<li>Checkout</li>
					</ul>
				</div>
				<h1 class="heading_primary">Payment Info</h1></div>
		</div>
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-12">
						<div class="entry-content">
							<div class="travel_tour">
						
							<div class="row">
								<div class="col-md-10 columns">
									<div class="order-wrapper">
										<h3 id="order_review_heading">Your order</h3>
										<div id="order_review" class="travel_tour-checkout-review-order">

										<?php
					                      $query = "SELECT * FROM tbl_booking WHERE usrId = '$userid' LIMIT 1";
					                      $pacbooking = $db->select($query);
					                      if ($pacbooking) {
					                       while ($result = $pacbooking->fetch_assoc()) {
					                      
					                     ?>
											<table class="shop_table travel_tour-checkout-review-order-table">
												<thead>
												<tr>
													<th class="product-name">Tour</th>
													<th class="product-total">Total</th>
												</tr>
												</thead>
												<tbody>
												<tr class="cart_item">
													<td class="product-name">
														<?php echo $result['pacName']; ?>
													</td>
													<td class="product-total">
														৳<?php echo $result['pacPrice']; ?>
													</td>
												</tr>
												</tbody>
												<tfoot>

												<tr class="cart-subtotal">
													<th>Vat(3%)</th>
													<td>
														<span class="travel_tour-Price-amount amount"><span class="travel_tour-Price-currencySymbol">৳</span>
														<?php
														$vat = $result['pacPrice'] * 0.03;
														echo $vat;
														 ?>
														</span>
													</td>
												</tr>


												<tr class="order-total">
													<th>Total</th>
													<td>
														<strong><span class="travel_tour-Price-amount amount"><span class="travel_tour-Price-currencySymbol">৳</span>
														<?php
														$total = $result['pacPrice'] + $vat;
														echo $total;
														 ?>


														</span></strong>
													</td>
												</tr>


												</tfoot>
											</table>
											<?php } } ?>

										</div>
									</div>

			                        <div class="col-sm-6">
			                             <label for="phn" class="required" style="color: green;">Confirm bKash Payment</label><br>

			                             <a type="button" href="?orderId=order" class="button alt">order</a>
			                        </div><!--/ [col] -->

								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php include 'inc/footer.php'; ?>