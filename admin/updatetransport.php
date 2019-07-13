                        
                    <?php include 'inc/header.php'; ?>
                            
                         <?php 
                            if (!isset($_GET['transId']) || $_GET['transId'] == NULL) {
                                header("location:viewtransport.php");
                            }else {
                                $transId = $_GET['transId'];
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
                                        <h1>Update Transport</h1>
                                    </div>
                                    <!-- END Main Title -->
                                </div>
                            </div>
                            
                            <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
                        </div>
                        <!-- END Dashboard Header -->

                        <!-- Mini Top Stats Row -->
                        <div class="row">
                        <?php 
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $transport_type = $fm->validation($_POST['transport_type']);
                                $transport_name = $fm->validation($_POST['transport_name']);
                                $transport_class = $fm->validation($_POST['transport_class']);

                                $transport_type = mysqli_real_escape_string($db->link, $transport_type);
                                $transport_name = mysqli_real_escape_string($db->link, $transport_name);
                                $transport_class = mysqli_real_escape_string($db->link, $transport_class);
                                if ($transport_type == "" || $transport_name == "" || $transport_class == "") {
                                    echo"<span style='color:red;'>Field must not be Empty!</span>";
                                }else{
                                $query = "UPDATE tbl_transport
                                    SET
                                    transport_type = '$transport_type',
                                    transport_name = '$transport_name',
                                    transport_class = '$transport_class'
                                    WHERE id = '$transId'
                                ";
                                $update_transport = $db->insert($query);

                                if ($update_transport) {
                                    echo"<span style='color:green;'>Transport Update Successfully</span>";
                                }else {
                                     echo"<span style='color:red;'>Transport not Update</span>";
                                }
                            }
                          }
                        ?>


                           <?php
                            $query = "SELECT * FROM tbl_transport WHERE id = '$transId' ORDER BY id DESC";
                            $transport = $db->select($query);
                            if ($transport) {
                                while ($result = $transport->fetch_assoc()) {
                                
                              
                         ?>
                           
                           <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="transport_type">Transport Type</label>
                                    <div class="col-md-5">
                                        <input id="transport_type" name="transport_type" class="form-control " value="<?php echo $result['transport_type']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="transport_name">Transport Name</label>
                                    <div class="col-md-5">
                                        <input id="transport_name" name="transport_name" class="form-control " value="<?php echo $result['transport_name']; ?>" type="text">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="transport_class">Transport Class</label>
                                    <div class="col-md-5">
                                        <input id="transport_class" name="transport_class" class="form-control " value="<?php echo $result['transport_class']; ?>" type="text">
                                    </div>
                                </div>

                              
                            <!-- END First Step -->

                                <!-- Form Buttons -->
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-sm btn-primary" id="next4" value="Next">Submit</button>
                                    </div>
                                </div>
                                <!-- END Form Buttons -->
                            </form>
                           <?php } } ?>
                        </div>
                        <!-- END Mini Top Stats Row -->
                       
                    </div>
                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>