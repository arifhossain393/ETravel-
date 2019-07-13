<?php include 'inc/header.php'; ?>
	<div class="site wrapper-content">
		<div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
			<div class="banner-wrapper container article_heading">
				<div class="breadcrumbs-wrapper">
					<ul class="phys-breadcrumb">
						<li><a href="index-2.html" class="home">Home</a></li>
						<li>Gallery</li>
					</ul>
				</div>
				<h1 class="heading_primary">Gallery</h1></div>
		</div>
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-12 full-width">
						<div class="sc-gallery wrapper_gallery">
							<div class="gallery-tabs-wrapper filters">
								<ul class="gallery-tabs">
									<li><a href="#" data-filter="*" class="filter active">all</a></li>

									<?php
                                    $query = "SELECT *  FROM tbl_gallery ORDER BY id DESC";
                                    $gallery = $db->select($query);
                                    if ($gallery) {
                                        while ($result = $gallery->fetch_assoc()) {
                                 ?>
									<li><a href="#" data-filter=".<?php echo $result['name']; ?>" class="filter"><?php echo $result['name']; ?></a></li>
								<?php } } ?>
								</ul>
							</div>
							<div class="row content_gallery">
								<?php
                                    $query = "SELECT *  FROM tbl_gallery ORDER BY id DESC";
                                    $gallery = $db->select($query);
                                    if ($gallery) {
                                        while ($result = $gallery->fetch_assoc()) {
                                      
                                 ?>

								<div class="col-sm-4 gallery_item-wrap <?php echo $result['name']; ?>">
									<a href="admin/<?php echo $result['gallery_image']; ?>" class="swipebox" title="World’s hottest destinations for vegans">
										<img style="height: 270px; width: 360px;" src="admin/<?php echo $result['gallery_image']; ?>" alt="World’s hottest destinations for vegans">
										<div class="gallery-item">
											<h4 class="title"><?php echo $result['name']; ?></h4>
										</div>
									</a>
								</div>
								<?php } } ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php include 'inc/footer.php'; ?>