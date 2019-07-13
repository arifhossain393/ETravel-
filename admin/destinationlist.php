                        
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
                           

                                <table class="data display datatable" id="example">
                                    <thead>
                                        <tr>
                                            <th width="25%">No</th>
                                            <th width="25%">Place</th>
                                            <th width="25%">Place Image</th>
                                            <th width="25%">Action</th>
                                            
                                        </tr>
                                    </thead>
                                     <?php
                                        $query = "SELECT * FROM tbl_destination ORDER BY id DESC";
                                        $destination = $db->select($query);
                                        if ($destination) {
                                            $i = 0;
                                            while ($result = $destination->fetch_assoc()) {
                                                $i++;
                                          
                                     ?>
                                    <tbody>
                                      
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><p><?php echo $result['place']; ?></p></td>
                                            <td><img style="height: 60px; width: 60px; margin-bottom: 20px;" src="../admin/<?php echo $result['place_img']; ?>"></td>
                                            <td><a class="btn btn-info" href="editdestination.php?desId=<?php echo $result['id']; ?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you Sure to Delete!');" href="deletedestination.php?delId=<?php echo $result['id']; ?>">Delete</a></td>
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