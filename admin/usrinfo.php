                    <?php include 'inc/header.php'; ?>

                    <?php 
                        if(!isset($_GET['usrId']) || $_GET['usrId'] == NULL){
                            echo "<script>window.location = 'bookinglist.php';</script>";
                        }else{
                            $usrId = $_GET['usrId'];
                        }

                    ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Customer Details</h1>
                                    </div>
                                    <!-- END Main Title -->
                                </div>
                            </div>
                            
                            <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
                        </div>
                        <!-- END Dashboard Header -->


                        <!-- Addresses -->
                        <div class="row">
                            <div class="col-sm-10 offset-md-2">
                                <!-- Shipping Address Block -->

                            <?php
                                $query = "SELECT * FROM tbl_user WHERE id='$usrId' LIMIT 1";
                                $viewsaddress = $db->select($query);
                                if ($viewsaddress) {
                                    while ($result = $viewsaddress->fetch_assoc()) {
                             ?>
                                <div class="block">
                                    <!-- Shipping Address Title -->
                                    <div class="block-title">
                                        <h2><i class="fa fa-building-o"></i> <strong>Customer</strong> Address</h2>
                                    </div>
                                    <!-- END Shipping Address Title -->

                                    <!-- Shipping Address Content -->
                                    <h4><strong><?php echo $result['name']; ?></strong></h4>
                                    <address>
                                        <?php echo $result['address']; ?><br>
                                        <?php echo $result['city']; ?>, <?php echo $result['zip']; ?><br>
                                        <?php echo $result['companyName']; ?><br><br>
                                        <i class="fa fa-phone"></i> <?php echo $result['phone']; ?><br>
                                        <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)"><?php echo $result['email']; ?></a>
                                    </address>
                                    <!-- END Shipping Address Content -->
                                </div>
                                <!-- END Shipping Address Block -->
                                <?php } } ?>

                            </div>
                        </div>
                        <!-- END Addresses -->
                    </div>
                    <!-- END Page Content -->
                <?php include 'inc/footer.php'; ?>