                        
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
                            <div class="block">
                            <!-- Products Title -->
                            <div class="block-title">
                                <h2><i class="fa fa-shopping-cart"></i> <strong>Total Booking</strong></h2>
                            </div>
                            <!-- END Products Title -->

                            <!-- Products Content -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 100px;">ID</th>
                                            <th>Package Name</th>
                                            <th class="text-center">User Id</th>
                                            <th class="text-center">Package ID</th>
                                            <th class="text-right" style="width: 10%;">Booking Date</th>
                                            <th class="text-right" style="width: 10%;">PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                <?php
                                  $query = "SELECT * FROM tbl_order ORDER BY id";
                                  $cartpro = $db->select($query);
                                  if ($cartpro) {
                                    $sum = 0;
                                    $i = 0;
                                      while ($result = $cartpro->fetch_assoc()) {
                                        $i++;
                                        ?>

                                        <tr>
                                            <td class="text-center"><strong><?php echo $i; ?></strong></td>
                                            <td><?php echo $result['pacName']; ?></td>
                                            <td class="text-center"><strong><?php echo $result['usrId']; ?></strong></td>
                                            <td class="text-center"><strong><?php echo $result['pacId']; ?></strong></td>
                                            <td class="text-right"><strong><?php echo $fm->DateFormate($result['bookDate']); ?></strong></td>
                                            <td class="text-right"><strong>৳<?php echo $result['pacPrice']; ?></strong></td>
                                        </tr>

                                    <?php 

                                    $sum = $sum + $result['pacPrice'];
                                    Session::set("sum", $sum);

                                } } ?>

                                        
                                       
                                        <tr>
                                            <td colspan="5" class="text-right text-uppercase"><strong>Total Price:</strong></td>
                                            <td class="text-right"><strong>৳<?php echo Session::get("sum"); ?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Products Content -->
                        </div>
                            
                        </div>
                        <!-- END Mini Top Stats Row -->
                       
                    </div>
                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>