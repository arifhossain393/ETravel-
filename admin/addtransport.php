                        
                    <?php include 'inc/header.php'; ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Add Your Destination</h1>
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
                                }
                                else{
                                   
                                    $query = "INSERT INTO  tbl_transport(transport_type, transport_name, transport_class) VALUES('$transport_type', '$transport_name', '$transport_class')";
                                    $transportinsert = $db->insert($query);

                                    if ($transportinsert) {
                                        echo"<span style='color:green;'>Transport Add Successfully</span>";
                                    }else {
                                         echo"<span style='color:red;'>Transport not Added</span>";
                                    }
                                }
                              }

                            ?>
                           <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="transport_type">Transport Type</label>
                                    <div class="col-md-5">
                                        <input id="transport_type" name="transport_type" class="form-control " placeholder="Enter Transport type.." type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="transport_name">Transport Name</label>
                                    <div class="col-md-5">
                                        <input id="transport_name" name="transport_name" class="form-control " placeholder="Enter Transport Name.." type="text">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="transport_class">Transport Class</label>
                                    <div class="col-md-5">
                                        <input id="transport_class" name="transport_class" class="form-control " placeholder="Enter Transport Class.." type="text">
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
                           
                        </div>
                        <!-- END Mini Top Stats Row -->
                       
                    </div>
                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>