                        
                    <?php include 'inc/header.php'; ?>
                        
                         <?php 
                            if (!isset($_GET['desId']) || $_GET['desId'] == NULL) {
                                header("location:destinationlist.php");
                            }else {
                                $desId = $_GET['desId'];
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
                                        <h1>Add Your Destination</h1>
                                    </div>
                                    <!-- END Main Title -->
                                </div>
                            </div>
                            
                            <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
                        </div>
                        <!-- END Dashboard Header -->

                        <!-- Mini Top Stats Row -->
                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                
                                $place = mysqli_real_escape_string($db->link, $_POST['place']);

                                $permited = array('jpg', 'jpeg', 'png', 'gif');
                                $file_name = $_FILES['place_img']['name'];
                                $file_size = $_FILES['place_img']['size'];
                                $file_temp = $_FILES['place_img']['tmp_name'];

                                $div = explode('.', $file_name);
                                $file_ext = strtolower(end($div));
                                $uniq_image = substr(md5(time()), 0,10).'.'.$file_ext;

                                $upload_image = "upload/".$uniq_image;

                                if ($place == "") {
                                    echo"<span style='color:red;'>Field must not be empty</span>";
                                }else{
                                    if (!empty($file_name)) {
                                        if ($file_size > 1048567) {
                                            echo "<div class='alert alert-danger'>Image size should be less 1MB.</div>";
                                        }elseif (in_array($file_ext, $permited) === false) {
                                            echo "<div class='alert alert-danger'>you can upload only:-".implode(',', $permited)."</div>";
                                        }else {
                                            
                                        move_uploaded_file($file_temp, $upload_image);
                                        $query = "
                                            UPDATE tbl_destination
                                            SET
                                            place = '$place',
                                            place_img = '$upload_image'
                                            WHERE id = '$desId'
                                         ";
                                        $update_rows = $db->update($query);
                                        if ($update_rows) {
                                            echo "<span style='color:green;'>Destination Update Successfully</span>";
                                        }else {
                                            echo "<span style='color:red;'>Destination Update Not Successfully</span>";
                                        }
                                    }
                                }else {
                                     move_uploaded_file($file_temp, $upload_image);
                                        $query = "
                                            UPDATE tbl_destination
                                            SET
                                            place = '$place',
                                            place_img = '$upload_image'
                                            WHERE id = '$desId'
                                         ";
                                        $update_rows = $db->update($query);
                                        if ($update_rows) {
                                            echo "<span style='color:green;'>Destination Update Successfully</span>";
                                        }else {
                                            echo "<span style='color:red;'>Destination Update Not Successfully</span>";
                                        }
                                }
                            }
                        }
                     ?>
                        <div class="row">
                           <?php
                                $query = "SELECT * FROM tbl_destination WHERE id = '$desId' ORDER BY id DESC";
                                $destination = $db->select($query);
                                if ($destination) {
                                    while ($result = $destination->fetch_assoc()) {
                                       
                                  
                             ?>
                           <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard" enctype="multipart/form-data">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="place">Place Name</label>
                                    <div class="col-md-5">
                                        <input id="place" name="place" class="form-control"
                                         value="<?php echo $result['place']; ?>" type="text">
                                    </div>
                                </div>
                              
                               <div class="form-group">
                                    <label class="col-md-4 control-label" for="place_img">Place Image</label>
                                    <div class="col-md-5">
                                        <img style="height: 60px; width: 60px; margin-bottom: 20px;" src="../admin/<?php echo $result['place_img']; ?>"> </br>
                                        <input id="place_img" name="place_img" class="form-control " type="file">
                                    </div>
                                </div>
                            
                            <!-- END First Step -->

                                <!-- Form Buttons -->
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-sm btn-primary" id="next4" value="Next">update</button>
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