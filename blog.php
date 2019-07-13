<?php include 'inc/header.php'; ?>
	<div class="site wrapper-content">
		<div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
			<div class="banner-wrapper container article_heading">
				<div class="breadcrumbs-wrapper">
					<ul class="phys-breadcrumb">
						<li><a href="index-2.html" class="home">Home</a></li>
						<li>Blog</li>
					</ul>
				</div>
				<h1 class="heading_primary">Blog</h1></div>
		</div>
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-9 align-left">
						<div class="wrapper-blog-content">
						<?php 
							$per_page = 6;
							if (isset($_GET["page"])) {
								$page = $_GET["page"];
							} else {
								$page = 1;
							}
							$start_form = ($page - 1) * $per_page;

						?>


						<?php 
							$query = "SELECT * FROM tbl_blog limit $start_form, $per_page";
							$blog = $db->select($query);
							if ($blog) {
								while($result = $blog->fetch_assoc()){


						?>

							<article class="type-post">
								<div class="img_post"><a href="single-blog.php">
									<img width="370" height="260" src="admin/<?php echo $result['blog_img']; ?>" class="wp-post-image" alt=""></a>
								</div>
								<div class="entry-content content-thumbnail">
									<header class="entry-header">
										<h2 class="entry-title">
											<a href="single-blog.php" rel="bookmark"><?php echo $result['title']; ?></a>
										</h2>
										<div class="entry-meta">
											<span class="posted-on">Posted on <a href="single-blog.php" rel="bookmark">
												<time class="entry-date published" datetime=""><?php echo $fm->DateFormate($result['pub_date']); ?></time>
											</a></span>
										</div>
									</header>
									<div class="entry-desc">
										<p><?php echo $fm->textShorten($result['description'], 100); ?></p>
									</div>
								</div>
							</article>
							<?php } } ?>
						
						</div>
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
					<div class="widget-area col-sm-3 alignright">

					 <aside class="widget widget_travel_tour">
						<div class="wrapper-special-tours">

						<?php
							$query = "select * from tbl_package limit 3";
							$sidebarpost = $db->select($query);

							if ($sidebarpost) {
								while ($rresult = $sidebarpost->fetch_assoc()) {

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
		</section>
	</div>
	<?php include 'inc/footer.php'; ?>