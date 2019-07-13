                        
                    <?php include 'inc/header.php'; ?>
                        
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Welcome <strong><?php echo Session::get('user_name'); ?></strong></h1>
                                    </div>
                                    <!-- END Main Title -->
                                </div>
                            </div>
                            
                            <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
                        </div>
                        <!-- END Dashboard Header -->

                        <!-- Mini Top Stats Row -->
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href="addpackage.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                                            <i class="fa fa-file-text"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                            New <strong>Package</strong><br>
                                            <small>Add Package</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href="viewpackage.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                                            <i class="gi gi-usd"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                            <strong>Total 
                                        <?php
                                            $query = "SELECT * FROM tbl_package ORDER BY id DESC";
                                            $pacage = $db->select($query);
                                            if ($pacage) {
                                                $count = mysqli_num_rows($pacage);
                                                echo $count; 
                                            }else {
                                                echo "0";
                                            }

                                        ?>

                                            </strong><br>
                                            <small>Packages</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href="inbox.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                                            <i class="gi gi-envelope"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                       <?php
                                            $query = "SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC";
                                            $msg = $db->select($query);
                                            if ($msg) {
                                                $count = mysqli_num_rows($msg);
                                                echo $count; 
                                            }else {
                                                echo "0";
                                            }

                                        ?> <strong>Messages</strong>
                                            <small>Support Center</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href="viewgallery.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                                            <i class="gi gi-picture"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                             <?php
                                            $query = "SELECT * FROM tbl_gallery ORDER BY id DESC";
                                            $gallery = $db->select($query);
                                            if ($gallery) {
                                                $count = mysqli_num_rows($gallery);
                                                echo $count; 
                                            }else {
                                                echo "0";
                                            }

                                        ?> <strong>Photos</strong>
                                            <small>Gallery</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <!-- Widget -->
                                <a href="bookinglist.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                                            <i class="gi gi-picture"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                             <?php
                                            $query = "SELECT * FROM tbl_booking ORDER BY id DESC";
                                            $booking = $db->select($query);
                                            if ($booking) {
                                                $count = mysqli_num_rows($booking);
                                                echo $count; 
                                            }else {
                                                echo "0";
                                            }

                                        ?> <strong>Booking</strong>
                                            <small>Package</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <!-- Widget -->
                                <a href="viewcustompackage.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                                            <i class="gi gi-picture"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                             <?php
                                            $query = "SELECT * FROM tbl_custom_package ORDER BY id DESC";
                                            $package = $db->select($query);
                                            if ($package) {
                                                $count = mysqli_num_rows($package);
                                                echo $count; 
                                            }else {
                                                echo "0";
                                            }

                                        ?> <strong>Custom</strong>
                                            <small>Package</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <!-- Widget -->
                                <a href="bookamount.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                                            <i class="gi gi-usd"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                <?php
                                  $query = "SELECT pacPrice FROM tbl_order ORDER BY id";
                                  $cartpro = $db->select($query);
                                  if ($cartpro) {
                                    $sum = 0;
                                      while ($result = $cartpro->fetch_assoc()) {

                                        $sum = $sum + $result['pacPrice'];
                                         Session::set("sum", $sum);

                                      }
                                      
                                  }

                                 ?>
                                    ৳<?php echo Session::get("sum"); ?>
                                         <strong>Total</strong>
                                            <small>Amount</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            
                            
                        </div>
                        <!-- END Mini Top Stats Row -->
                       
                    </div>
                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>