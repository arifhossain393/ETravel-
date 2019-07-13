                        
                    <?php include 'inc/header.php'; ?>
                      
                         <?php 
                            if (!isset($_GET['galId']) || $_GET['galId'] == NULL) {
                                header("location:viewgallery.php");
                            }else {
                                $galId = $_GET['galId'];
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
                                        <h1>Update Gellery</h1>
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
                                
                                $name = $fm->validation($_POST['name']);
                                $pacid = mysqli_real_escape_string($db->link, $_POST['pacid']);
                                $name = mysqli_real_escape_string($db->link, $name);

                                $permited = array('jpg', 'jpeg', 'png', 'gif');
                                $file_name = $_FILES['gallery_image']['name'];
                                $file_size = $_FILES['gallery_image']['size'];
                                $file_temp = $_FILES['gallery_image']['tmp_name'];

                                $div = explode('.', $file_name);
                                $file_ext = strtolower(end($div));
                                $uniq_image = substr(md5(time()), 0,10).'.'.$file_ext;

                                $upload_image = "upload/".$uniq_image;

                                if ($pacid == "" || $name == "") {
                                    echo"<span style='color:red;'>Field must not be empty</span>";
                                }else{
                                    if (!empty($file_name)) {
                                        if ($file_size > 3145701) {
                                            echo "<div class='alert alert-danger'>Image size should be less 3MB.</div>";
                                        }elseif (in_array($file_ext, $permited) === false) {
                                            echo "<div class='alert alert-danger'>you can upload only:-".implode(',', $permited)."</div>";
                                        }else {
                                            
                                        move_uploaded_file($file_temp, $upload_image);
                                        $query = "
                                           UPDATE tbl_gallery
                                            SET
                                            pacid = '$pacid',
                                            name = '$name',
                                            gallery_image = '$upload_image'
                                            WHERE id = '$galId'
                                         ";
                                        $update_rows = $db->update($query);
                                        if ($update_rows) {
                                            echo "<span style='color:green;'>Gallery Image Update Successfully</span>";
                                        }else {
                                            echo "<span style='color:red;'>Gallery Image Update Not Successfully</span>";
                                        }
                                    }
                                }else {
                                     move_uploaded_file($file_temp, $upload_image);
                                        $query = "
                                            UPDATE tbl_gallery
                                            SET
                                            pacid = '$pacid',
                                            name = '$name',
                                            gallery_image = '$upload_image'
                                            WHERE id = '$galId'
                                         ";
                                        $update_rows = $db->update($query);
                                        if ($update_rows) {
                                            echo "<span style='color:green;'>Gallery Image Update Successfully</span>";
                                        }else {
                                            echo "<span style='color:red;'>Gallery Image Update Not Successfully</span>";
                                        }
                                }
                            }
                        }
                     ?>



                           <?php
                            $query = "SELECT * FROM tbl_gallery WHERE id = '$galId' ORDER BY id DESC";
                            $gallery = $db->select($query);
                            if ($gallery) {
                                while ($galresult = $gallery->fetch_assoc()) {
                                
                              
                         ?>
                           
                          
                           <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard" enctype="multipart/form-data">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pacid">Package Title</label>
                                    <div class="col-md-6">
                                        <select id="pacid" name="pacid" class="form-control" size="1">
                                            <?php 
                                                $query = "select * from tbl_package";
                                                $package = $db->select($query);
                                                if ($package) {
                                                    while($result = $package->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['pac_title']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Gallery Name</label>
                                    <div class="col-md-6">
                                        <input id="name" name="name" class="form-control " value="<?php echo $galresult['name']; ?>" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="gallery_image">Gallery Image</label>
                                    <div class="col-md-6">
                                        <img style="height: 60px; width: 60px;" src="<?php echo $galresult['gallery_image']; ?>">
                                        <input id="gallery_image" name="gallery_image" type="file">
                                    </div>
                                </div>

                                 <!-- END First Step -->

                                <!-- Form Buttons -->
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-sm btn-primary" id="next4" value="Next">Update</button>
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