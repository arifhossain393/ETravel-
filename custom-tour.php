<?php include 'inc/header.php'; ?>
	<div class="site wrapper-content">
		
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-9 alignleft">
						<div class="custom-tour" style="padding: 50px 0;">
						</div>
						<div class="pages_content padding-top-4x">
							<h4>Request Custom Tour</h4>
							<div class="contact_infor">
								<p>Travel booking Bangladesh is one of the fastest-growing online travel platforms of Bangladesh. We do everything to make your trip memorable, from planning tours, estimating costs, providing hotel suggestions, bookings, transport options, and tourism information, to planning guided tours for sightseeing, shopping – you name it!</p>
							</div>
						</div>
						<div class="wpb_wrapper pages_content">
							<?php 
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $name = $fm->validation($_POST['name']);
                                $email = $fm->validation($_POST['email']);
                                $phone = $fm->validation($_POST['phone']);
                                $trans_type = $fm->validation($_POST['trans_type']);
                                $travel_date = $fm->validation($_POST['travel_date']);
                                $profession = $fm->validation($_POST['profession']);
                                $visit_country = $fm->validation($_POST['visit_country']);
                                $pre_visit = $fm->validation($_POST['pre_visit']);
                                $bio = $fm->validation($_POST['bio']);

                                $name = mysqli_real_escape_string($db->link, $name);
                                $email = mysqli_real_escape_string($db->link, $email);
                                $phone = mysqli_real_escape_string($db->link, $phone);
                                $trans_type = mysqli_real_escape_string($db->link, $trans_type);
                                $travel_date = mysqli_real_escape_string($db->link, $travel_date);
                                $profession = mysqli_real_escape_string($db->link, $profession);
                                $visit_country = mysqli_real_escape_string($db->link, $visit_country);
                                $pre_visit = mysqli_real_escape_string($db->link, $pre_visit);
                                $bio = mysqli_real_escape_string($db->link, $bio);

                               // form validation

                                if ($name == "" || $email == "" || $phone == "" || $trans_type == "" || $travel_date == "" || $profession == "" || $visit_country == "" || $pre_visit == "" || $bio == "" ) {
                                    echo"<span style='color:red;'>Field must not be Empty!</span>";
                                }
                               
						      else if(strlen($name) < 3){
						        echo"<div class='alert alert-danger'>User Name Too much Short!!</div>";
						      }
						      else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
						        echo"<div class='alert alert-danger'><strong>Error!</strong> UserName must only contain ulphanumirical, dashes and underscore.</div>";
						      }
						       else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
						        echo"<div class='alert alert-danger'><strong>Error !</strong>Invalide Email</div>";
						      }
						      else if(strlen($phone) < 10){
						        echo"<div class='alert alert-danger'>Your Phone Number are not valid!!</div>";
						      }else{
                                    $query = "INSERT INTO  tbl_custom_package(name, email, phone, trans_type, travel_date, profession, visit_country, pre_visit, bio) VALUES('$name', '$email', '$phone', '$trans_type', '$travel_date', '$profession', '$visit_country', '$pre_visit', '$bio')";
                                    $custominsert = $db->insert($query);

                                    if ($custominsert) {
                                        echo"<span style='color:green;'>Your Custom Request Send Successfully</span>";
                                    }else {
                                         echo"<span style='color:red;'>Your Request Not Send</span>";
                                    }
                                }
                              }

                            ?>

							<div role="form" class="wpcf7">
								<div class="screen-reader-response"></div>
								<form action="#" method="post" class="wpcf7-form" novalidate="novalidate">
									<div class="form-contact">
										
										<div class="form-contact-fields col-sm-8">
											<span class="wpcf7-form-control-wrap your-name">
												<input type="text" name="name" value="" size="40" class="wpcf7-form-control" placeholder="Your name*">
											</span>
										</div>
										<div class="form-contact-fields col-sm-8">
											<span class="wpcf7-form-control-wrap your-email">
												<input type="email" name="email" value="" size="40" class="wpcf7-form-control" placeholder="Email*">
											</span>
										</div>
									
										<div class="form-contact-fields col-sm-8">
											<span class="wpcf7-form-control-wrap your-subject">
												<input type="text" name="phone" value="" size="40" class="wpcf7-form-control" placeholder="Phone No..">
											</span>
										</div>

										<div class="form-contact-fields col-sm-8">
											<span class="wpcf7-form-control-wrap your-subject">
												<input type="text" name="trans_type" value="" size="40" class="wpcf7-form-control" placeholder="Which you Prefare Transport">
											</span>
										</div>

										<div class="form-contact-fields col-sm-8">
											<span class="wpcf7-form-control-wrap your-subject">
												<input type="date" name="travel_date" value="" size="40" class="wpcf7-form-control" placeholder="Type your Travel Date : Ex:yyyy-mm-dd ">
											</span>
										</div>
								
										<div class="form-contact-fields col-sm-8">
											<span class="wpcf7-form-control-wrap your-subject">
												<input type="text" name="profession" value="" size="40" class="wpcf7-form-control" placeholder="Present Profession">
											</span>
										</div>

										<div class="form-contact-fields col-sm-8">
											<span class="wpcf7-form-control-wrap your-subject">
												<input type="text" name="visit_country" value="" size="40" class="wpcf7-form-control" placeholder="Which Country do you want visit now">
											</span>
										</div>

										<div class="form-contact-fields col-sm-8">
											<span class="wpcf7-form-control-wrap your-subject">
												<input type="text" name="pre_visit" value="" size="40" class="wpcf7-form-control" placeholder="Which Country you have previously visit">
											</span>
										</div>

										<div class="form-contact-fields col-sm-8">
											<span class="wpcf7-form-control-wrap your-message">
												<textarea name="bio" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="About you"></textarea>
												 </span><br>
											<input type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
	</div>
	<?php include 'inc/footer.php'; ?>