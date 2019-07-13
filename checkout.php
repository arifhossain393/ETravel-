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
				<h1 class="heading_primary">Checkout</h1></div>
		</div>
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-12">
						<div class="entry-content">
							<div class="travel_tour">
						<?php 
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $name = $fm->validation($_POST['name']);
                            $username = $fm->validation($_POST['username']);
                            $email = $fm->validation($_POST['email']);
                            $phone = $fm->validation($_POST['phone']);
                            $companyName = $fm->validation($_POST['companyName']);
                            $address = $fm->validation($_POST['address']);
                            $zip = $fm->validation($_POST['zip']);
                            $city = $fm->validation($_POST['city']);

                            $name = mysqli_real_escape_string($db->link, $name);
                            $username = mysqli_real_escape_string($db->link, $username);
                            $email = mysqli_real_escape_string($db->link, $email);
                            $phone = mysqli_real_escape_string($db->link, $phone);
                            $companyName = mysqli_real_escape_string($db->link, $companyName);
                            $address = mysqli_real_escape_string($db->link, $address);
                            $zip = mysqli_real_escape_string($db->link, $zip);
                            $city = mysqli_real_escape_string($db->link, $city);

                            // form validation
                            
                            if (empty($name) || empty($username) || empty($email)  || empty($phone) || empty($address) || empty($zip) || empty($city) ) {
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
                                     companyName = '$companyName',
                                     address = '$address',
                                     zip = '$zip',
                                     city = '$city'
                                    WHERE id ='$userid'";
                                $update_user = $db->update($query);

                                if ($update_user) {
                                 
					                if (isset($_POST["paymentbtn"])) {
					                  if (isset($_POST["payment_method"])) {
					                  $answer = $_POST['payment_method'];
					                     if($answer == "bkash") {
					                         echo "<script>window.location='bkashpayment.php';</script>";
					                     }    
					                   elseif($answer == "dbbl"){
					                     echo "<script>window.location='dbbl.php';</script>";
					                  }
					                }
					              }
										          
                                }else {
                                   //  echo"<span style='color:red;'>User not Update</span>";
                                }
                            }
                          }
                        ?>
							

						<?php
                            $query = "SELECT * FROM tbl_user WHERE id ='$userid'";
                            $getuser = $db->select($query);
                            if ($getuser) {
                                 while ($result = $getuser->fetch_assoc()) {

                           ?>
								<form name="checkout" method="post" class="checkout travel_tour-checkout" action="">
									<div class="row">
										<div class="col-md-7 columns">
											<div class="col2-set" id="customer_details">
												<div class="col-1">
													<div class="travel_tour-billing-fields">
														<h3>Billing Details</h3>
														<p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
															<label for="billing_first_name" class="">Name
															<abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="name" id="billing_first_name" value="<?php echo $result['name']; ?>">
														</p>
														<p class="form-row form-row form-row-last validate-required" id="billing_last_name_field">
															<label for="billing_last_name" class="">User Name
															<abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="username" id="billing_last_name" value="<?php echo $result['username']; ?>">
														</p>
														<div class="clear"></div>
														<p class="form-row form-row form-row-wide" id="billing_company_field">
															<label for="billing_company" class="">Company Name</label><input type="text" class="input-text " name="companyName" id="billing_company" placeholder="" value="<?php echo $result['companyName']; ?>">
														</p>
														<p class="form-row form-row form-row-first validate-required validate-email" id="billing_email_field">
															<label for="billing_email" class="">Email Address
															<abbr class="required" title="required">*</abbr></label><input type="email" class="input-text " name="email" id="billing_email" placeholder="" value="<?php echo $result['email']; ?>">
														</p>
														<p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field">
															<label for="billing_phone" class="">Phone
															<abbr class="required" title="required">*</abbr></label><input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="" value="<?php echo $result['phone']; ?>">
														</p>
														<div class="clear"></div>
														
														<p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
															<label for="billing_address_1" class="">Address
																<abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="address" id="billing_address_1" placeholder="Street address" value="<?php echo $result['address']; ?>">
														</p>

														<p class="form-row form-row address-field validate-postcode form-row-first" id="billing_postcode_field">
															<label for="billing_postcode" class="">Postcode / ZIP</label><input type="text" class="input-text " name="zip" id="billing_postcode" placeholder="" value="<?php echo $result['zip']; ?>">
														</p>
														<p class="form-row form-row address-field validate-required form-row-last" id="billing_city_field">
															<label for="billing_city" class="">Town / City
																<abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="city" id="billing_city" placeholder="" value="<?php echo $result['city']; ?>">
														</p>

														<div class="clear"></div>
													</div>
												</div>
												
											</div>
										</div>
										<div class="col-md-5 columns">
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

													
													<div id="payment" class="travel_tour-checkout-payment">
														<ul class="wc_payment_methods payment_methods methods">
															<li class="wc_payment_method payment_method_bacs">
																<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bkash" checked="checked">
																<label for="payment_method_bacs">
																	bKash </label>
															</li>
															<li class="wc_payment_method payment_method_cheque">
																<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="dbbl">
																<label for="payment_method_cheque">
																	DBBL </label>
															</li>
														</ul>
														<div class="form-row place-order">
															<input type="submit" class="button alt" name="paymentbtn" id="place_order" value="Place order">
														</div>
													</div>
									
												</div>
											</div>
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