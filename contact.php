<?php include 'inc/header.php'; ?>
	<div class="site wrapper-content">
		<div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
			<div class="banner-wrapper container article_heading">
				<div class="breadcrumbs-wrapper">
					<ul class="phys-breadcrumb">
						<li><a href="index-2.html" class="home">Home</a></li>
						<li>Contact</li>
					</ul>
				</div>
				<h1 class="heading_primary">Contact</h1></div>
		</div>
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-9 alignleft">
						<div class="video-container">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6304.829986131271!2d-122.4746968033092!3d37.80374752160443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808586e6302615a1%3A0x86bd130251757c00!2sStorey+Ave%2C+San+Francisco%2C+CA+94129!5e0!3m2!1sen!2sus!4v1435826432051" width="600" height="450" style="border: 0; pointer-events: none;" allowfullscreen=""></iframe>
						</div>
						<div class="pages_content padding-top-4x">
							<h4>CONTACT INFORMATION</h4>
							<div class="contact_infor">
								<ul>
									<li><label><i class="fa fa-map-marker"></i>ADDRESS</label>
										<div class="des">House # 38, Garib e Newaj Avenue, Sector # 11, Uttara, Shaka-1230</div>
									</li>
									<li><label><i class="fa fa-phone"></i>TEL NO</label>
										<div class="des">+8801836961741</div>
									</li>
									
									<li><label><i class="fa fa-envelope"></i>EMAIL</label>
										<div class="des">info@deshitravels.com</div>
									</li>
									<li>
										<label><i class="fa fa-clock-o"></i>WORKING HOURS</label>
										<div class="des">Sat – Thus 9:00 am – 5:30 pm, Sat 9:00 am – 1:00 pm
											
										</div>
									</li>
									
								</ul>
							</div>
						</div>
						<div class="wpb_wrapper pages_content">
							<h4>Have a question?</h4>
							<?php 
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $name = $fm->validation($_POST['name']);
                                $email = $fm->validation($_POST['email']);
                                $subject = $fm->validation($_POST['subject']);
                                $message = $fm->validation($_POST['message']);

                                $name = mysqli_real_escape_string($db->link, $name);
                                $email = mysqli_real_escape_string($db->link, $email);
                                $subject = mysqli_real_escape_string($db->link, $subject);
                                $message = mysqli_real_escape_string($db->link, $message);

                               

                                if ($name == "" || $email == "" || $subject == "" || $message == "") {
                                    echo"<span style='color:red;'>Field must not be Empty!</span>";
                                }
                                else{
                                   
                                    $query = "INSERT INTO  tbl_contact(name, email, subject, message) VALUES('$name', '$email', '$subject', '$message')";
                                    $contactinsert = $db->insert($query);

                                    if ($contactinsert) {
                                        echo"<span style='color:green;'>Your Mail Send Successfully</span>";
                                    }else {
                                         echo"<span style='color:red;'>Your Mail Not Send</span>";
                                    }
                                }
                              }

                            ?>

							<div role="form" class="wpcf7">
								<div class="screen-reader-response"></div>
								<form action="" method="post" class="wpcf7-form" novalidate="novalidate">
									<div class="form-contact">
										<div class="row-1x">
											<div class="col-sm-6">
													<span class="wpcf7-form-control-wrap your-name">
														<input type="text" name="name" value="" size="40" class="wpcf7-form-control" placeholder="Your name*">
													</span>
											</div>
											<div class="col-sm-6">
													<span class="wpcf7-form-control-wrap your-email">
														<input type="email" name="email" value="" size="40" class="wpcf7-form-control" placeholder="Email*">
													</span>
											</div>
										</div>
										<div class="form-contact-fields">
												<span class="wpcf7-form-control-wrap your-subject">
													<input type="text" name="subject" value="" size="40" class="wpcf7-form-control" placeholder="Subject">
												</span>
										</div>
										<div class="form-contact-fields">
											<span class="wpcf7-form-control-wrap your-message">
												<textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="Message"></textarea>
												 </span><br>
											<input type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit">
										</div>
									</div>
								</form>


							</div>
						</div>
					</div>
					<div class="widget-area col-sm-3 align-left">
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