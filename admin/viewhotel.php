                        
                    <?php include 'inc/header.php'; ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Destination List</h1>
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
                                <?php 
                                    if (isset($_GET['delcat'])) {
                                        $delcat = $_GET['delcat'];
                                        $delquery = "delete from tbl_category where id='$delcat'";
                                        $deldata = $db->delete($delquery);
                                        if ($deldata) {
                                            echo"<span style='color:green;'>Category Delete Successfully</span>";
                                        }else{
                                            echo"<span style='color:green;'>Category not Delete</span>";
                                        }
                                    }

                            ?>

                                <table class="data display datatable" id="example">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th width="15%">Hotel Name</th>
                                            <th width="15%">Hotel Type</th>
                                            <th width="20%">Image</th>
                                            <th width="25%">Hotel Address</th>
                                            <th width="15%">Action</th>
                                            
                                        </tr>
                                    </thead>
                                     <?php
                                        $query = "SELECT * FROM tbl_hotel ORDER BY id DESC";
                                        $hotel = $db->select($query);
                                        if ($hotel) {
                                            $i = 0;
                                            while ($result = $hotel->fetch_assoc()) {
                                                $i++;
                                          
                                     ?>
                                    <tbody>
                                      
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><p><?php echo $result['hotel_name']; ?></p></td>
                                            <td><p><?php echo $result['hotel_type']; ?></p></td>
                                            <td><img style="height: 60px; width: 60px;" src="../admin/<?php echo $result['hotel_img']; ?>"></td>
                                            <td><p><?php echo $result['hotel_address']; ?></p></td>
                                            <td><a class="btn btn-info" href="updatehotel.php?hotelId=<?php echo $result['id']; ?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you Sure to Delete!');" href="delhotel.php?delId=<?php echo $result['id']; ?>">Delete</a></td>
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