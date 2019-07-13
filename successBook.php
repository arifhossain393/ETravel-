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
										<h3 id="order_review_heading">Order Booking</h3>
										<div id="order_review" class="travel_tour-checkout-review-order">
											<h4 style="color: green; padding-top: 20px;">Seccessfully Your Order Booking</h4>

										</div>
									</div>

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