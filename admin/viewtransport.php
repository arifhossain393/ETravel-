                        
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
                                            <th width="20%">Transport Type</th>
                                            <th width="20%">Transport Name</th>
                                            <th width="20%">Transport Class</th>
                                            <th width="20%">Action</th>
                                            
                                        </tr>
                                    </thead>
                                     <?php
                                        $query = "SELECT * FROM tbl_transport ORDER BY id DESC";
                                        $transport = $db->select($query);
                                        if ($transport) {
                                            $i = 0;
                                            while ($result = $transport->fetch_assoc()) {
                                                $i++;
                                          
                                     ?>
                                    <tbody>
                                      
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><p><?php echo $result['transport_type']; ?></p></td>
                                            <td><p><?php echo $result['transport_name']; ?></p></td>
                                            <td><p><?php echo $result['transport_class']; ?></p></td>
                                            <td><a class="btn btn-info" href="updatetransport.php?transId=<?php echo $result['id']; ?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you Sure to Delete!');" href="?delId=<?php echo $result['id']; ?>">Delete</a></td>
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