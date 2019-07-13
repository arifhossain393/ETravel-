                        
                    <?php include 'inc/header.php'; ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Custom User List</h1>
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
                            <h2>Custom Package List</h2>
                            <div class="block">
                                <?php 
                                    if (isset($_GET['delcat'])) {
                                        $delcat = $_GET['delcat'];
                                        $delquery = "delete from tbl_custom_package where id='$delcat'";
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
                                            <th width="5%">No</th>
                                            <th width="10%">Name</th>
                                            <th width="15%">Email</th>
                                            <th width="15%">Phone</th>
                                            <th width="15%">Country Name</th>
                                            <th width="15%">Visit Date</th>
                                            <th width="20%">Transport Type</th>
                                            <th width="5%">Action</th>

                                        </tr>
                                    </thead>
                                     <?php
                                        $query = "SELECT * FROM tbl_custom_package ORDER BY id DESC";
                                        $customtour = $db->select($query);
                                        if ($customtour) {
                                            $i = 0;
                                            while ($result = $customtour->fetch_assoc()) {
                                                $i++;
                                          
                                     ?>
                                    <tbody>
                                      
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><p><?php echo $result['name']; ?></p></td>
                                            <td><p><?php echo $result['email']; ?></p></td>
                                            <td><p><?php echo $result['phone']; ?></p></td>
                                            <td><p><?php echo $result['visit_country']; ?></p></td>
                                            <td><p><?php echo $fm->DateFormate($result['travel_date']); ?></p></td>
                                            <td><p><?php echo $result['trans_type']; ?></p></td>
                                            <td><a class="btn btn-danger" onclick="return confirm('Are you Sure to Delete!');" href="?delcat=<?php echo $result['id']; ?>">Delete</a></td>
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