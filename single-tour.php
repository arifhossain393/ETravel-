<?php include 'inc/header.php'; ?>

<?php 
		if (!isset($_GET['pacId']) || $_GET['pacId'] == NULL) {
			header("Location:index.php");
		}
		else {
			$pacId = $_GET['pacId'];
		}

	?>
	<div class="site wrapper-content">
		<div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
			<div class="banner-wrapper container article_heading">
				<div class="breadcrumbs-wrapper">
					<ul class="phys-breadcrumb">
						<li><a href="" class="home">Home</a></li>
						<li><a href="">Single Package</a></li>
					</ul>
				</div>
				<h2 class="heading_primary">Single Package</h2></div>
		</div>
	<?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $bookDate = mysqli_real_escape_string($db->link , $_POST['bookDate']);
        $pacId = mysqli_real_escape_string($db->link , $pacId);
		$usrId = Session::get("userId");
        
		$squery = "SELECT * FROM tbl_package WHERE id = '$pacId'";
		$result = $db->select($squery)->fetch_assoc();
		
		$pacName = $result['pac_title'];
		$price = $result['price'];

		$chkqury = "SELECT * FROM tbl_booking WHERE pacId ='$pacId' AND usrId ='$usrId'";

		$bookpac = $db->select($chkqury);
		if ($bookpac) {
			echo"<span style='color:red;'>Package All ready added</span>";
		}else{
		if (empty($bookDate)) {
			echo"<span style='color:red;'>Field must not be Empty!</span>";
		}else{
		$query = "INSERT INTO tbl_booking(usrId, pacId, pacName, pacPrice, bookDate) VALUES('$usrId','$pacId', '$pacName','$price','$bookDate')";
			
			$inserted_row = $db->insert($query);
			 if($inserted_row){
				echo "<script>window.location = 'checkout.php';</script>";
			}else{
				echo "<script>window.location = 'package.php';</script>";
			}
		  } 
		}
      }

    ?>


		<section class="content-area single-woo-tour">
			<div class="container">
				<?php
	                $query = "SELECT tbl_package.*, tbl_destination.place, tbl_category.cat_name, tbl_hotel.*, tbl_transport.* FROM tbl_package
		                INNER JOIN tbl_destination ON tbl_package.desid = tbl_destination.id
		                INNER JOIN tbl_category ON tbl_package.catid = tbl_category.id
		                INNER JOIN tbl_hotel ON tbl_package.hotelid = tbl_hotel.id
		                INNER JOIN tbl_transport ON tbl_package.transid = tbl_transport.id
	                    WHERE tbl_package.id = '$pacId'";

	                $package = $db->select($query);
	                if ($package) {
	                    while ($result = $package->fetch_assoc()) {
	                      
	             ?>

				<div class="tb_single_tour product">
					<div class="top_content_single row">
						<div class="images images_single_left">
							<div class="title-single">
								<div class="title">
									<h1><?php echo $result['pac_title']; ?></h1>
								</div>
							</div>
							<div class="tour_after_title">
								<div class="meta_date">
									<span><?php echo $result['duration']; ?></span>
								</div>
								<div class="meta_values">
									<span>Category:</span>
									<div class="value">
										<a href="" rel="tag"><?php echo $result['cat_name']; ?></a>
									</div>
								</div>
								
							</div>
							<div id="slider" class="flexslider">
								<ul class="slides">
								<?php
                                    $query = "SELECT tbl_gallery.*, tbl_package.* FROM tbl_gallery
		                			INNER JOIN tbl_package ON tbl_gallery.pacid = tbl_package.id
									WHERE tbl_package.id = '$pacId'";

                                    $gallery = $db->select($query);
                                    if ($gallery) {
                                        while ($galresult = $gallery->fetch_assoc()) {
                                 ?>
									
									<li>
										<a href="admin/<?php echo $galresult['gallery_image']; ?>" class="swipebox" title=""><img style="height: 700px; width: 950px;" src="admin/<?php echo $galresult['gallery_image']; ?>" class="attachment-shop_single size-shop_single wp-post-image" alt="" title="" draggable="false"></a>
									</li>
									<?php } } ?>
								</ul>
							</div>
							<div id="carousel" class="flexslider thumbnail_product">
								<ul class="slides">
									<?php
	                                    $query = "SELECT tbl_gallery.*, tbl_package.* FROM tbl_gallery
		                			INNER JOIN tbl_package ON tbl_gallery.pacid = tbl_package.id
									 WHERE tbl_package.id = '$pacId'";
	                                    $gallery = $db->select($query);
	                                    if ($gallery) {
	                                        while ($galresult = $gallery->fetch_assoc()) {
                                      
                                 ?>
									<li>
										<img style="height: 100px; width: 150px;" src="admin/<?php echo $galresult['gallery_image']; ?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" title="" draggable="false">
									</li>
								<?php } } ?>
									
								</ul>
							</div>
							<div class="clear"></div>
							<div class="single-tour-tabs wc-tabs-wrapper">
								<ul class="tabs wc-tabs" role="tablist">
									<li class="description_tab active" role="presentation">
										<a href="#tab-description" role="tab" data-toggle="tab">Description</a>
									</li>
									<li class="itinerary_tab_tab" role="presentation">
										<a href="#tab-itinerary_tab" role="tab" data-toggle="tab">Itinerary</a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane single-tour-tabs-panel single-tour-tabs-panel--description panel entry-content wc-tab active" id="tab-description">
										<?php echo $result['description']; ?>
										<table class="tours-tabs_table">
											<tbody>
										<?php 
											if ($result['pac_type'] != '2') { ?>
											<tr>
												<td><strong>Hotel Information :</strong></td>
												<td><strong>Hotel name:</strong> <?php echo $result['hotel_name']; ?></td>
												<td><strong>Hotel Type:</strong> <?php echo $result['hotel_type']; ?></td>
											</tr>
											<tr>
												<td><img src="admin/<?php echo $result['hotel_img']; ?>"></td>
												<td><strong>Hotel Address:</strong> <?php echo $result['hotel_address']; ?></td>
											</tr>
										<?php } ?>
											
											<tr>
												<td><strong>Transport Details:</strong></td>
												<td><strong>Transport Type:</strong> <?php echo $result['transport_type']; ?></td>
												<td><strong>Transport Name:</strong> <?php echo $result['transport_name']; ?></td>
												<td><strong>Transport Class:</strong> <?php echo $result['transport_class']; ?></td>
											</tr>
											</tbody>
										</table>
									</div>
									<div role="tabpanel" class="tab-pane single-tour-tabs-panel single-tour-tabs-panel--itinerary_tab panel entry-content wc-tab" id="tab-itinerary_tab">
										<div class="interary-item">
											<div class="item_content">
												<?php echo $result['itinerary']; ?>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="summary entry-summary description_single">
							<div class="affix-sidebar">
								<div class="entry-content-tour">
									<p class="price">
										<span class="text">Price:</span><span class="travel_tour-Price-amount amount">৳<?php echo $result['price']; ?></span>
									</p>
									<div class="clear"></div>
									<div class="booking">
										<div class="">
											<div class="form-block__title">
												<h4>Book the tour</h4>
											</div>
										<?php 
										if (Session::get("cuslogin") == true) {
											
										?>
											<form id="tourBookingForm" method="POST" action="#">
												<div class="">
													<input name="Name" value="<?php echo Session::get("name"); ?>" placeholder="Name" type="text">
												</div>
												
												<div class="">
													<input name="email_tour" value="<?php echo Session::get("email"); ?>" placeholder="Email" type="text">
												</div>
												<div class="">
													<input name="phone" value="<?php echo Session::get("phone"); ?>" placeholder="Phone" type="text">
												</div>
												<div class="">
													<input type="date" name="bookDate" value="" placeholder="Date Book : yyyy-mm-dd" class="hasDatepicker">
												</div>
												
												<div class="spinner">
													<div class="rect1"></div>
													<div class="rect2"></div>
													<div class="rect3"></div>
													<div class="rect4"></div>
													<div class="rect5"></div>
												</div>

												<input class="btn-booking btn" value="Booking now" type="submit">
											</form>
											<?php }else{ ?>

												<a href="login.php"><button type="button" class="btn btn-success">
													Login
												</button></a>

											<?php	} ?>

										</div>
									</div>
									
								</div>
								<div class="widget-area align-left col-sm-3">
									<aside class="widget widget_travel_tour">
										<div class="wrapper-special-tours">

										<?php
											$catid = $result['catid'];
											$queryrelated = "select * from tbl_package where catid = '$catid' order by rand() limit 3";
											$relatedpost = $db->select($queryrelated);

											if ($relatedpost) {
												while ($rresult = $relatedpost->fetch_assoc()) {

										 ?>
											<div class="inner-special-tours">
												<a href="tour.php">
													<img width="430" height="305" src="admin/<?php echo $rresult['image']; ?>" alt="" title=""></a>
												<div class="item_rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="post_title"><h3>
													<a href="single-tour.php?pacId=<?php echo $rresult['id']; ?>" rel="bookmark"><?php echo $rresult['pac_title']; ?></a>
												</h3></div>
												<div class="item_price">
													<span class="price">৳<?php echo $rresult['price']; ?></span>
												</div>
											</div>
											<?php } } ?>
											
										</div>
									</aside>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?PHP } } ?>




			</div>
		</section>
	</div>
	<?php include 'inc/footer.php'; ?>