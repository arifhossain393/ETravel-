<?php include 'inc/header.php'; ?>


<?php
	$userid =Session::get('userId');
    $login = Session::get("cuslogin");
    if ($login == false) {
        echo "<script>window.location='login.php';</script>";
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
								<?php
					                if (isset($_POST["bkashbutton"])) {
					                  if (isset($_POST["security"])) {
					                  $bkash = $_POST['security'];
					                     if(empty($bkash)) {
					                         echo"<div class='alert alert-danger'>Field must not be Empty!</div>";
					                     }    
					                   elseif(strlen($bkash) < 5){
					                    echo"<div class='alert alert-danger'>Security Key is not Valid</div>";
					                  }else {
					                    echo "<script>window.location='cbkashpay.php';</script>";
					                  }
					                }
					              }
					            ?>
								<form action="" method="post">

			                        <div class="col-sm-6">
			                            <label for="phn" class="required"><strong>bKash Number :</strong> 01956-000056</label><br>
			                            <label for="phn" class="required">Security Key</label>
			                            <input class="input form-control" type="text" name="security" id="phn" value="" placeholder="Enter your 6 digit Secutity Key"><br>
										<input type="submit" class="button alt" name="bkashbutton" id="place_order" value="order">
			                        </div><!--/ [col] -->

						      </form>


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