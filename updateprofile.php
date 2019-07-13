<?php include 'inc/header.php'; ?>
<?php
    $userid =Session::get('userId');

?>
	<div class="site wrapper-content">
		
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-9 alignleft">
						<div class="custom-tour" style="padding: 50px 0;">
						</div>
						
						<div class="wpb_wrapper pages_content">
						<?php 
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $name = $fm->validation($_POST['name']);
                            $username = $fm->validation($_POST['username']);
                            $email = $fm->validation($_POST['email']);
                            $phone = $fm->validation($_POST['phone']);
                            $password = md5($_POST['password']);
                            $companyName = $fm->validation($_POST['companyName']);
                            $address = $fm->validation($_POST['address']);
                            $zip = $fm->validation($_POST['zip']);
                            $city = $fm->validation($_POST['city']);

                            $name = mysqli_real_escape_string($db->link, $name);
                            $username = mysqli_real_escape_string($db->link, $username);
                            $email = mysqli_real_escape_string($db->link, $email);
                            $phone = mysqli_real_escape_string($db->link, $phone);
                            $password = mysqli_real_escape_string($db->link, $password);
                            $companyName = mysqli_real_escape_string($db->link, $companyName);
                            $address = mysqli_real_escape_string($db->link, $address);
                            $zip = mysqli_real_escape_string($db->link, $zip);
                            $city = mysqli_real_escape_string($db->link, $city);

                            // form validation
                            
                            if (empty($name) || empty($username) || empty($email)  || empty($phone) || empty($password) || empty($address) || empty($zip) || empty($city) ) {
                                echo"<span style='color:red;'>Field must not be Empty!</span>";
                            }
                           	 else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
						        echo"<div class='alert alert-danger'><strong>Error!</strong> Name must only contain ulphanumirical, dashes and underscore.</div>";
						      }
						      else if(strlen($username) < 3){
						        echo"<div class='alert alert-danger'>User Name Too much Short!!</div>";
						      }
						      else if(!preg_match("/^[a-zA-Z ]*$/",$username)){
						        echo"<div class='alert alert-danger'><strong>Error!</strong> UserName must only contain ulphanumirical, dashes and underscore.</div>";
						      }
						       else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
						        echo"<div class='alert alert-danger'><strong>Error !</strong>Invalide Email</div>";
						      }
						      else if(strlen($phone) < 10){
						        echo"<div class='alert alert-danger'>Your Phone Number are not valid!!</div>";
						      }else{
                                $query = "UPDATE tbl_user
                                    SET
                                     name = '$name',
                                     username = '$username',
                                     email = '$email',
                                     phone = '$phone',
                                     password = '$password',
                                     companyName = '$companyName',
                                     address = '$address',
                                     zip = '$zip',
                                     city = '$city'
                                    WHERE id ='$userid'";
                                $update_user = $db->update($query);

                                if ($update_user) {
                                    echo"<span style='color:green;'>User Update Successfully</span>";
                                }else {
                                     echo"<span style='color:red;'>User not Update</span>";
                                }
                            }
                          }
                        ?>
						
							<div role="form" class="wpcf7">
								<div class="screen-reader-response"></div>
						<?php
                            $query = "SELECT * FROM tbl_user WHERE id ='$userid'";
                            $getuser = $db->select($query);
                            if ($getuser) {
                                 while ($result = $getuser->fetch_assoc()) {

                           ?>
								<form action="#" method="post" class="wpcf7-form" novalidate="novalidate">
									<div class="form-contact">
										
										<div class="form-contact-fields col-sm-8">
											<label for="">Name</label>
											<span class="wpcf7-form-control-wrap your-name">
												<input type="text" name="name" value="<?php echo $result['name']; ?>" size="40" class="wpcf7-form-control">
											</span>
										</div>
										<div class="form-contact-fields col-sm-8">
											<label for="">User Name</label>
											<span class="wpcf7-form-control-wrap your-email">
												<input type="test" name="username" value="<?php echo $result['username']; ?>" size="40" class="wpcf7-form-control">
											</span>
										</div>
									
										<div class="form-contact-fields col-sm-8">
											<label for="">Email</label>
											<span class="wpcf7-form-control-wrap your-subject">
												<input type="email" name="email" value="<?php echo $result['email']; ?>" size="40" class="wpcf7-form-control">
											</span>
										</div>

										<div class="form-contact-fields col-sm-8">
											<label for="">Phone</label>
											<span class="wpcf7-form-control-wrap your-subject">
												<input type="text" name="phone" value="<?php echo $result['phone']; ?>" size="40" class="wpcf7-form-control">
											</span>
										</div>

										<div class="form-contact-fields col-sm-8">
											<label for="">Password</label>
											<span class="wpcf7-form-control-wrap your-subject">
												<input type="password" name="password" value="" size="40" class="wpcf7-form-control">
											</span>
										</div>
								
										<div class="form-contact-fields col-sm-8">
											<label for="">Company Name</label>
											<span class="wpcf7-form-control-wrap your-subject">
												<input type="text" name="companyName" value="<?php echo $result['companyName']; ?>" size="40" class="wpcf7-form-control">
											</span>
										</div>

										<div class="form-contact-fields col-sm-8">
											<label for="">Address</label>
											<span class="wpcf7-form-control-wrap your-message">
												<textarea name="address" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea"><?php echo $result['address']; ?></textarea>
												 </span><br>
										</div>
										<div class="form-contact-fields col-sm-8">
											<label for="">Zip Code</label>
											<span class="wpcf7-form-control-wrap your-subject">
												<input type="text" name="zip" value="<?php echo $result['zip']; ?>" size="40" class="wpcf7-form-control">
											</span>
										</div>
										<div class="form-contact-fields col-sm-8">
											<label for="">City</label>
											<span class="wpcf7-form-control-wrap your-subject">
												<input type="text" name="city" value="<?php echo $result['city']; ?>" size="40" class="wpcf7-form-control">
											</span><br>
											<input type="submit" value="Update" class="wpcf7-form-control wpcf7-submit">
										</div>
									</div>
								</form>
								<?php } } ?>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
	</div>
	<?php include 'inc/footer.php'; ?>