<?php include 'inc/header.php'; ?>
	<div class="site wrapper-content">
		<div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
			<div class="banner-wrapper container article_heading">
				<div class="breadcrumbs-wrapper">
					<ul class="phys-breadcrumb">
						<li><a href="index-2.html" class="home">Home</a></li>
						<li>Tours</li>
					</ul>
				</div>
				<h1 class="heading_primary">Tours</h1></div>
		</div>
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-12">

						<ul class="tours products wrapper-tours-slider">
							<!--pagination -->
							<?php 
								$per_page = 9;
								if (isset($_GET["page"])) {
									$page = $_GET["page"];
								} else {
									$page = 1;
								}
								$start_form = ($page - 1) * $per_page;

							?>
							<!--pagination -->
							<?php
                                $query = "SELECT * FROM tbl_package WHERE pac_type = '2' limit $start_form, $per_page";
                                $package = $db->select($query);
                                if ($package) {
                                    
                                    while ($result = $package->fetch_assoc()) {
                                       
                                  
                             ?>
							<li class="item-tour col-md-4 col-sm-6 product">
								<div class="item_border item-product">
									<div class="post_images">
										<a href="single-tour.php?pacId=<?php echo $result['id']; ?>">
											<span class="price">৳<?php echo $result['price']; ?></span>
											<img style="width: 430px; height: 305px;" src="admin/<?php echo $result['image']; ?>" alt="" title="">
										</a>
									</div>
									<div class="wrapper_content">
										<div class="post_title"><h4>
											<a href="single-tour.php?pacId=<?php echo $result['id']; ?>" rel="bookmark"><?php echo $result['pac_title']; ?></a>
										</h4></div>
										<span class="post_date"><?php echo $result['duration']; ?></span>
										<div class="description">
											<p><?php echo $fm->textShorten($result['description'], 20); ?></p>
										</div>
									</div>
									<div class="read_more">
										<div class="item_rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<a rel="nofollow" href="single-tour.php?pacId=<?php echo $result['id']; ?>" class="button product_type_tour_phys add_to_cart_button">Read more</a>
									</div>
								</div>
							</li>
						<?php } } ?>
						</ul>

						<div class="navigation paging-navigation" role="navigation">
							<ul class="page-numbers">
								<!--pagination -->
								<?php
									$query = "select * from tbl_package";
									$result = $db->select($query);
									$total_rows = mysqli_num_rows($result);
									$total_pages = ceil($total_rows / $per_page);

								 
								 	for ($i = 1; $i <= $total_pages; $i++) {
								 		echo "<li><a class='page-numbers' href='package.php?page=".$i."'>".$i."</a></li>";
								 	}

									echo "<li><a class='page-numbers' href='package.php?page=$total_pages'>".'<i class="fa fa-long-arrow-right"></i>'."</a></li>" ?>
								<!--pagination -->
								
							</ul>
						</div>

					</div>
				</div>
			</div>
		</section>
	</div>
	<?php include 'inc/footer.php'; ?>