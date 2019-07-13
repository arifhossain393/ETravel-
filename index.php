	<?php include 'inc/header.php'; ?>
	<div class="site wrapper-content">
		<div class="home-content" role="main">
			<div class="top_site_main">

 			</div>
			<div id="home-page-slider-image" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="images/home/slider2.jpg" alt="Home Slider 1">
						<div class="carousel-caption content-slider">
							<div class="container">
							<h2>WONDERFUL BLUE BEACH </h2>
							<p>Template based on deep research on the most popular travel booking websites such as booking, tripadvisor, yahoo travel </p>
							<p><a href="tours.html" class="btn btn-slider">VIEW TOURS </a></p>
							</div>
						</div>
					</div>
					<div class="item">
						<img src="images/home/slider1.jpg" alt="Home Slider 2">
						<div class="carousel-caption content-slider">
							<div class="container">
							<h2>WONDERFUL BLUE BEACH </h2>
							<p>Template based on deep research on the most popular travel booking websites such as booking, tripadvisor, yahoo travel </p>
							<p><a href="tours.html" class="btn btn-slider">VIEW TOURS </a></p>
						</div>
						</div>
					</div>
					<div class="item">
						<img src="images/home/slider.jpg" alt="Home Slider 2">
						<div class="carousel-caption content-slider">
							<div class="container">
							<h2>WONDERFUL BLUE BEACH </h2>
							<p>Template based on deep research on the most popular travel booking websites such as booking, tripadvisor, yahoo travel </p>
							<p><a href="tours.html" class="btn btn-slider">VIEW TOURS </a></p>
						</div>
						</div>
					</div>
				</div>
				<!-- Controls -->
				<a class="carousel-control-left" href="#home-page-slider-image" data-slide="prev">
					<i class="lnr lnr-chevron-left"></i>
				</a>
				<a class="carousel-control-right" href="#home-page-slider-image" data-slide="next">
					<i class="lnr lnr-chevron-right"></i>
				</a>
			</div>
			<div class="section-white padding-top-6x padding-bottom-6x tours-type">
				<div class="container">
					<div class="shortcode_title title-center title-decoration-bottom-center">
						<div class="title_subtitle">Find a Tour by</div>
						<h3 class="title_primary">DESTINATION</h3><span class="line_after_title"></span>
					</div>
					<div class="wrapper-tours-slider wrapper-tours-type-slider">
						<div class="tours-type-slider" data-dots="true" data-nav="true" data-responsive='{"0":{"items":1}, "480":{"items":2}, "768":{"items":3}, "992":{"items":4}, "1200":{"items":5}}'>
							<?php
                                $query = "SELECT * FROM tbl_destination ORDER BY id DESC";
                                $destination = $db->select($query);
                                if ($destination) {
                                    while ($result = $destination->fetch_assoc()) {
                                      
                                  
                             ?>

							<div class="tours_type_item">
								<a href="" class="tours-type__item__image">
									<img src="admin/<?php echo $result['place_img']; ?>" alt="<?php echo $result['place']; ?>">
								</a>
								<div class="content-item">
									<div class="item__title"><?php echo $result['place']; ?></div>
								</div>
							</div>
							<?php } } ?>
							
							
						</div>
					</div>
				</div>
			</div>

			<div class="padding-top-6x padding-bottom-6x section-background" style="background-image:url(images/home/bg-popular.jpg)">
				<div class="container">
					<div class="shortcode_title text-white title-center title-decoration-bottom-center">
						<div class="title_subtitle">Take a Look at Our</div>
						<h3 class="title_primary">MOST POPULAR TOURS</h3>
						<span class="line_after_title" style="color:#ffffff"></span>
					</div>
					<div class="row wrapper-tours-slider">
						<div class="tours-type-slider list_content" data-dots="true" data-nav="true" data-responsive='{"0":{"items":1}, "480":{"items":2}, "768":{"items":2}, "992":{"items":3}, "1200":{"items":4}}'>
							
							<?php
                                $query = "SELECT * FROM tbl_package WHERE pac_type = '0' ORDER BY id DESC";
                                $package = $db->select($query);
                                if ($package) {
                                    
                                    while ($result = $package->fetch_assoc()) {
                                       
                                  
                             ?>

							<div class="item-tour">
								<div class="item_border">
									<div class="item_content">
										<div class="post_images">
											<a href="single-tour.php?pacId=<?php echo $result['id']; ?>" class="travel_tour-LoopProduct-link">
											<span class="price">
												<span class="travel_tour-Price-amount amount">৳<?php echo $result['price']; ?></span>
											</span>
												<img src="admin/<?php echo $result['image']; ?>" alt="" title="">
											</a>
											
										</div>
										<div class="wrapper_content">
											<div class="post_title"><h4>
												<a style="width: 262px; height: 164px;" href="single-tour.php?pacId=<?php echo $result['id']; ?>" rel="bookmark"><?php echo $result['pac_title']; ?></a>
											</h4></div>
											<span class="post_date"><?php echo $result['duration']; ?></span>
											<p><?php echo $fm->textShorten($result['description'], 20); ?></p>
										</div>
									</div>
									<div class="read_more">
										<div class="item_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
										</div>
										<a href="single-tour.php?pacId=<?php echo $result['id']; ?>" class="read_more_button">VIEW MORE
											<i class="fa fa-long-arrow-right"></i></a>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<?php } } ?>

						</div>
					</div>
				</div>
			</div>

			<div class="container two-column-respon mg-top-6x mg-bt-6x">
				<div class="row">
					<div class="col-sm-12 mg-btn-6x">
						<div class="shortcode_title title-center title-decoration-bottom-center">
							<h3 class="title_primary">WHY CHOOSE US?</h3><span class="line_after_title"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="wpb_column col-sm-4">
						<div class="widget-icon-box widget-icon-box-base iconbox-center">
							<div class="box-icon icon-image circle">
								<img src="images/home/Map-Marker.png" alt="">
							</div>
							<div class="content-inner">
								<div class="sc-heading article_heading">
									<h3 style="color:#000000" class="heading__primary">Handpicked Hotels</h3>
								</div>
								<div class="desc-icon-box">
									<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</div>
								</div>
							</div>
						</div>
					</div>
					<div class="wpb_column col-sm-4">
						<div class="widget-icon-box widget-icon-box-base iconbox-center">
							<div class="box-icon icon-image ">
								<img src="images/home/Worldwide-Location.png" alt="">
							</div>
							<div class="content-inner">
								<div class="sc-heading article_heading">
									<h3 style="color:#000000" class="heading__primary">World Class Service</h3>
								</div>
								<div class="desc-icon-box">
									<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</div>
								</div>
							</div>
						</div>
					</div>
					<div class="wpb_column col-sm-4">
						<div class="widget-icon-box widget-icon-box-base iconbox-center">
							<div class="box-icon icon-image ">
								<img src="images/home/Hot-Air-Balloon.png" alt="">
							</div>
							<div class="content-inner">
								<div class="sc-heading article_heading">
									<h3 style="color:#000000" class="heading__primary">Best Price Guarantee</h3>
								</div>
								<div class="desc-icon-box">
									<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
			<div class="section-white padding-top-6x padding-bottom-6x">
				<div class="container">
					<div class="shortcode_title title-center title-decoration-bottom-center">
						<h3 class="title_primary">SPECIAL PACKAGE</h3><span class="line_after_title"></span>
					</div>
					<div class="row wrapper-tours-slider">
						<div class="tours-type-slider list_content" data-dots="true" data-nav="true" data-responsive='{"0":{"items":1}, "480":{"items":2}, "768":{"items":3}, "992":{"items":3}, "1200":{"items":3}}'>
						<?php
                            $query = "SELECT * FROM tbl_package WHERE pac_type = '1' limit 3";
                            $package = $db->select($query);
                            if ($package) {
                                
                                while ($result = $package->fetch_assoc()) {
                              
                         ?>

							<div class="item-tour">
								<div class="item_border">
									<div class="item_content">
										<div class="post_images">
											<a href="single-tour.php?pacId=<?php echo $result['id']; ?>" class="travel_tour-LoopProduct-link">
											<span class="price">
												<span class="travel_tour-Price-amount amount">৳<?php echo $result['price']; ?></span>
											</span>
												<img src="admin/<?php echo $result['image']; ?>" alt="" title="">
											</a>
										</div>
										<div class="wrapper_content">
											<div class="post_title"><h4>
												<a href="single-tour.php?pacId=<?php echo $result['id']; ?>" rel="bookmark"><?php echo $result['pac_title']; ?></a>
											</h4></div>
											<span class="post_date"><?php echo $result['duration']; ?></span>
											<p><?php echo $fm->textShorten($result['description'], 20); ?></p>
										</div>
									</div>
									<div class="read_more">
										<div class="item_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
										</div>
										<a href="single-tour.php?pacId=<?php echo $result['id']; ?>" class="read_more_button">VIEW MORE
											<i class="fa fa-long-arrow-right"></i></a>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<?php } } ?>


						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<?php include 'inc/footer.php'; ?>