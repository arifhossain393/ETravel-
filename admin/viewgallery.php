                        
                    <?php include 'inc/header.php'; ?>
                       
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Gallery List</h1>
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
                                    if (isset($_GET['delId'])) {
                                        $deltransport = $_GET['delId'];
                                        $delquery = "delete from tbl_transport where id='$deltransport'";
                                        $deldata = $db->delete($delquery);
                                        if ($deldata) {
                                            echo"<span style='color:green;'>Transport Delete Successfully</span>";
                                        }else{
                                            echo"<span style='color:green;'>Transport not Delete</span>";
                                        }
                                    }

                            ?> 

                                <table class="data display datatable" id="example">
                                    <thead>
                                        <tr>
                                            <th width="20%">No</th>
                                            <th width="20%">Package Title</th>
                                            <th width="20%">Gallery Name</th>
                                            <th width="20%">Gallery Image</th>
                                            <th width="20%">Action</th>
                                            
                                        </tr>
                                    </thead>
                                     <?php
                                        $query = "SELECT tbl_gallery.*, tbl_package.pac_title FROM tbl_gallery
                                        INNER JOIN tbl_package ON tbl_gallery.pacid = tbl_package.id
                                        ORDER BY tbl_gallery.id DESC";
                                        $gallery = $db->select($query);
                                        if ($gallery) {
                                            $i = 0;
                                            while ($result = $gallery->fetch_assoc()) {
                                                $i++;
                                          
                                     ?>
                                    <tbody>
                                      
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><p><?php echo $result['pac_title']; ?></p></td>
                                            <td><p><?php echo $result['name']; ?></p></td>
                                            <td><img style="margin-top:10px; height: 60px; width: 60px;" src="../admin/<?php echo $result['gallery_image']; ?>"></td>
                                            <td><a class="btn btn-info" href="updategallery.php?galId=<?php echo $result['id']; ?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you Sure to Delete!');" href="delgallery.php?galId=<?php echo $result['id']; ?>">Delete</a></td>
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