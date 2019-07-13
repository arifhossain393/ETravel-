                        
                    <?php include 'inc/header.php'; ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Package List</h1>
                                    </div>
                                    <!-- END Main Title -->
                                </div>
                            </div>
                            
                            <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
                        </div>
                        <!-- END Dashboard Header -->

                        <!-- Mini Top Stats Row -->
                        <div class="row">
                          <div class="box round first grid">
                            <h2>Destination List</h2>
                            <div class="block">
                                
                                <table class="data display datatable" id="example">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="10%">Package Title</th>
                                            <th width="15%">Description</th>
                                            <th width="10%">Duration</th>
                                            <th width="15%">Itinerary</th>
                                            <th width="10%">Price</th>
                                            <th width="8%">Image</th>
                                            <th width="7%">Queantity</th>
                                            <th width="10%">Type</th>
                                            <th width="10%">Action</th>
                                            
                                        </tr>
                                    </thead>
                                     <?php
                                        $query = "SELECT tbl_package.*, tbl_destination.place, tbl_category.cat_name, tbl_hotel.hotel_name, tbl_hotel.hotel_type, tbl_transport.transport_type, tbl_transport.transport_name, tbl_transport.transport_class FROM tbl_package
                                        INNER JOIN tbl_destination ON tbl_package.desid = tbl_destination.id
                                        INNER JOIN tbl_category ON tbl_package.catid = tbl_category.id
                                        INNER JOIN tbl_hotel ON tbl_package.hotelid = tbl_hotel.id
                                         INNER JOIN tbl_transport ON tbl_package.transid = tbl_transport.id
                                            ORDER BY tbl_package.id DESC";

                                        $package = $db->select($query);
                                        if ($package) {
                                            $i = 0;
                                            while ($result = $package->fetch_assoc()) {
                                                $i++;
                                          
                                     ?>
                                    <tbody>
                                      
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><p><?php echo $result['pac_title']; ?></p></td>
                                            <td><p><?php echo $fm->textShorten($result['description'], 20); ?></p></td>
                                            <td><p><?php echo $result['duration']; ?></p></td>
                                            <td><p><?php echo $fm->textShorten($result['itinerary'], 40); ?></p></td>
                                            <td><p><?php echo $result['price']; ?></p></td>
                                            <td><img style="height: 60px; width: 60px;" src="../admin/<?php echo $result['image']; ?>"></td>
                                            <td><p><?php echo $result['quantity']; ?></p></td>
                                            <td><p>
                                                <?php 
                                                    if ($result['pac_type'] == '0') {
                                                        echo "Normal Package";
                                                    }
                                                    elseif ($result['pac_type'] == '1') {
                                                        echo "Special Package";
                                                    }elseif ($result['pac_type'] == '2') {
                                                        echo "Daily Package";
                                                    }

                                                  ?>
                                                    
                                                </p></td>
                                            <td><div class="btn-group">
                                                <a href="updatepac.php?pacId=<?php echo $result['id']; ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a href="delpac.php?pacId=<?php echo $result['id']; ?>" onclick="return confirm('Are you Sure to Delete!');" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                                            </div></td>
                                            
                                        </tr>
                                    </tbody>
                                    <?php   }  } ?>
                                </table>
                            

                           </div>
                        </div>
                    </div>
                        <!-- END Mini Top Stats Row -->
                       
                    </div>
                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>