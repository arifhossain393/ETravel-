<?php include 'inc/header.php'; ?>
<?php
    $userid =Session::get('userId');

?>
	<div class="site wrapper-content">
		
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-9 alignleft">
						<div class="user-profile" style="margin-top: 100px;">
						<?php
                            $query = "SELECT * FROM tbl_user WHERE id ='$userid'";
                            $getuser = $db->select($query);
                            if ($getuser) {
                                 while ($result = $getuser->fetch_assoc()) {

                           ?>
							<div class="block">
                            <!-- Info Title -->
                                <div class="block-title">
                                    <div class="block-options pull-right" style="position: relative; top: 25px;">
                                       
                                        <a href="updateprofile.php" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Update Profile"><i class="fa fa-pencil"></i></a>
                                    </div>
                                    <h2>About <strong><?php echo $result['name']; ?></strong></h2>
                                </div>
                                <!-- END Info Title -->

                                <!-- Info Content -->
                                <table class="table table-borderless table-striped">
                                    <tbody>
                                        <tr>
                                            <td style="width: 20%;"><strong>Name</strong></td>
                                            <td><?php echo $result['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Username</strong></td>
                                            <td><?php echo $result['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email</strong></td>
                                            <td><?php echo $result['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone</strong></td>
                                            <td><?php echo $result['phone']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Company Name</strong></td>
                                            <td><?php echo $result['companyName']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address</strong></td>
                                            <td><?php echo $result['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>City</strong></td>
                                            <td><?php echo $result['city']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Zip-code</strong></td>
                                            <td><?php echo $result['zip']; ?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <!-- END Info Content -->
                               </div>
                               <?php } } ?>
						</div>
					</div>
					
				</div>
			</div>
		</section>
	</div>
	<?php include 'inc/footer.php'; ?>