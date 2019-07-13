                        
                    <?php include 'inc/header.php'; ?>
                      
                         <?php 
                            if (!isset($_GET['hotelId']) || $_GET['hotelId'] == NULL) {
                                header("location:viewhotel.php");
                            }else {
                                $hotelId = $_GET['hotelId'];
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
                                        <h1>Update Hotel</h1>
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
                                
                                $hotel_name = $fm->validation($_POST['hotel_name']);
                                $hotel_type = $fm->validation($_POST['hotel_type']);
                                $hotel_address = $fm->validation($_POST['hotel_address']);

                                $hotel_name = mysqli_real_escape_string($db->link, $hotel_name);
                                $hotel_type = mysqli_real_escape_string($db->link, $hotel_type);
                                $hotel_address = mysqli_real_escape_string($db->link, $hotel_address);

                                $permited = array('jpg', 'jpeg', 'png', 'gif');
                                $file_name = $_FILES['hotel_img']['name'];
                                $file_size = $_FILES['hotel_img']['size'];
                                $file_temp = $_FILES['hotel_img']['tmp_name'];

                                $div = explode('.', $file_name);
                                $file_ext = strtolower(end($div));
                                $uniq_image = substr(md5(time()), 0,10).'.'.$file_ext;

                                $upload_image = "upload/".$uniq_image;

                                if ($hotel_name == "" || $hotel_type == "" || $hotel_address == "") {
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
                                           UPDATE tbl_hotel
                                            SET
                                            hotel_name = '$hotel_name',
                                            hotel_type = '$hotel_type',
                                            hotel_address = '$hotel_address',
                                            hotel_img = '$upload_image'
                                            WHERE id = '$hotelId'
                                         ";
                                        $update_rows = $db->update($query);
                                        if ($update_rows) {
                                            echo "<span style='color:green;'>Hotel Update Successfully</span>";
                                        }else {
                                            echo "<span style='color:red;'>Hotel Update Not Successfully</span>";
                                        }
                                    }
                                }else {
                                     move_uploaded_file($file_temp, $upload_image);
                                        $query = "
                                            UPDATE tbl_hotel
                                            SET
                                            hotel_name = '$hotel_name',
                                            hotel_type = '$hotel_type',
                                            hotel_address = '$hotel_address',
                                            hotel_img = '$upload_image'
                                            WHERE id = '$hotelId'
                                         ";
                                        $update_rows = $db->update($query);
                                        if ($update_rows) {
                                            echo "<span style='color:green;'>Hotel Update Successfully</span>";
                                        }else {
                                            echo "<span style='color:red;'>Hotel Update Not Successfully</span>";
                                        }
                                }
                            }
                        }
                     ?>



                           <?php
                            $query = "SELECT * FROM tbl_hotel WHERE id = '$hotelId' ORDER BY id DESC";
                            $hotel = $db->select($query);
                            if ($hotel) {
                                while ($result = $hotel->fetch_assoc()) {
                                
                              
                         ?>
                           
                           <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard" enctype="multipart/form-data">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="hotel_name">Hotel Name</label>
                                    <div class="col-md-5">
                                        <input id="hotel_name" name="hotel_name" class="form-control " value="<?php echo $result['hotel_name']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="hotel_type">Hotel Type</label>
                                    <div class="col-md-5">
                                        <input id="hotel_type" name="hotel_type" class="form-control " value="<?php echo $result['hotel_type']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="hotel_img">Hotel Image</label>
                                    <div class="col-md-5">
                                        <img style="height: 60px; width: 60px;" src="../admin/<?php echo $result['hotel_img']; ?>">
                                        <input id="hotel_img" name="hotel_img" class="form-control " type="file">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="category">Hotel Address</label>
                                    <div class="col-md-5">
                                        <textarea name="hotel_address" class="form-control"><?php echo $result['hotel_address']; ?></textarea>
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