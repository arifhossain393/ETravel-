                        
                    <?php include 'inc/header.php'; ?>
                    <?php 
                        if (!isset($_GET['pacId']) || $_GET['pacId'] == NULL) {
                            header("location:viewpackage.php");
                        }else {
                            $pacId = $_GET['pacId'];
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
                                        <h1>Update Package</h1>
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
                            
                            $pac_title = mysqli_real_escape_string($db->link, $_POST['pac_title']);
                            $desid = mysqli_real_escape_string($db->link, $_POST['desid']);
                            $catid = mysqli_real_escape_string($db->link, $_POST['catid']);
                            $hotelid = mysqli_real_escape_string($db->link, $_POST['hotelid']);
                            $transid = mysqli_real_escape_string($db->link, $_POST['transid']);
                            $description = mysqli_real_escape_string($db->link, $_POST['description']);
                            $duration = mysqli_real_escape_string($db->link, $_POST['duration']);
                            $itinerary = mysqli_real_escape_string($db->link, $_POST['itinerary']);
                            $price = mysqli_real_escape_string($db->link, $_POST['price']);
                            $quantity = mysqli_real_escape_string($db->link, $_POST['quantity']);
                            $pac_type = mysqli_real_escape_string($db->link, $_POST['pac_type']);

                            $permited = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['image']['name'];
                            $file_size = $_FILES['image']['size'];
                            $file_temp = $_FILES['image']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $uniq_image = substr(md5(time()), 0,10).'.'.$file_ext;

                            $upload_image = "upload/".$uniq_image;

                            if ($pac_title == "" || $desid == "" || $catid == "" || $hotelid == "" || $transid == "" || $description == "" || $duration == "" || $itinerary == "" || $price == "" || $quantity == "" || $pac_type == "") {
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
                                        UPDATE tbl_package
                                        SET
                                        desid = '$desid',
                                        catid = '$catid',
                                        hotelid = '$hotelid',
                                        transid = '$transid',
                                        pac_title = '$pac_title',
                                        description = '$description',
                                        duration = '$duration',
                                        itinerary = '$itinerary',
                                        price = '$price',
                                        image = '$upload_image',
                                        quantity = '$quantity',
                                        pac_type = '$pac_type'
                                        WHERE id = '$pacId'
                                     ";
                                    $update_package = $db->update($query);
                                    if ($update_package) {
                                        echo "<span style='color:green;'>Package Update Successfully</span>";
                                    }else {
                                        echo "<span style='color:red;'>Package Update Not Successfully</span>";
                                    }
                                }
                            }else {
                                 move_uploaded_file($file_temp, $upload_image);
                                    $query = "
                                        UPDATE tbl_package
                                        SET
                                        desid = '$desid',
                                        catid = '$catid',
                                        hotelid = '$hotelid',
                                        transid = '$transid',
                                        pac_title = '$pac_title',
                                        description = '$description',
                                        duration = '$duration',
                                        itinerary = '$itinerary',
                                        price = '$price',
                                        image = '$upload_image',
                                        quantity = '$quantity',
                                        pac_type = '$pac_type'
                                        WHERE id = '$pacId'
                                     ";
                                    $update_package = $db->update($query);
                                    if ($update_package) {
                                        echo "<span style='color:green;'>Package Update Successfully</span>";
                                    }else {
                                        echo "<span style='color:red;'>Package Update Not Successfully</span>";
                                    }
                            }
                        }
                    }
                 ?>


                            <?php
                            $query = "SELECT * FROM tbl_package WHERE id = '$pacId' ORDER BY id DESC";
                            $package = $db->select($query);
                            if ($package) {
                                while ($pacresult = $package->fetch_assoc()) {
                             
                            ?>   
                           <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard" enctype="multipart/form-data">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_title">Package Title</label>
                                    <div class="col-md-6">
                                        <input id="pac_title" name="pac_title" class="form-control " value="<?php echo $pacresult['pac_title']; ?>" type="text">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="desid">Place Name</label>
                                    <div class="col-md-6">
                                        <select id="desid" name="desid" class="form-control" size="1">
                                            <?php 
                                                $query = "select * from tbl_destination";
                                                $destination = $db->select($query);
                                                if ($destination) {
                                                    while($result = $destination->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['place']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="catid">Category Name</label>
                                    <div class="col-md-6">
                                        <select id="catid" name="catid" class="form-control" size="1">
                                            <?php 
                                                $query = "select * from tbl_category";
                                                $category = $db->select($query);
                                                if ($category) {
                                                    while($result = $category->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['cat_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="hotelid">Hotel Name</label>
                                    <div class="col-md-6">
                                        <select id="hotelid" name="hotelid" class="form-control" size="1">
                                            <?php 
                                                $query = "select * from tbl_hotel";
                                                $hotel = $db->select($query);
                                                if ($hotel) {
                                                    while($result = $hotel->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['hotel_name']; ?></option>
                                           <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="hotelid">Hotel Type</label>
                                    <div class="col-md-6">
                                        <select id="hotelid" name="hotelid" class="form-control" size="1">
                                            <?php 
                                                $query = "select * from tbl_hotel";
                                                $hotel = $db->select($query);
                                                if ($hotel) {
                                                    while($result = $hotel->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['hotel_type']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="transid">Transport Type</label>
                                    <div class="col-md-6">
                                        <select id="transid" name="transid" class="form-control" size="1">
                                            <?php 
                                                $query = "select * from tbl_transport";
                                                $transport = $db->select($query);
                                                if ($hotel) {
                                                    while($result = $transport->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['transport_type']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="transid">Transport Name</label>
                                    <div class="col-md-6">
                                        <select id="transid" name="transid" class="form-control" size="1">
                                            <?php 
                                                $query = "select * from tbl_transport";
                                                $transport = $db->select($query);
                                                if ($hotel) {
                                                    while($result = $transport->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['transport_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="transid">Transport Class</label>
                                    <div class="col-md-6">
                                        <select id="transid" name="transid" class="form-control" size="1">
                                            <?php 
                                                $query = "select * from tbl_transport";
                                                $transport = $db->select($query);
                                                if ($hotel) {
                                                    while($result = $transport->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['transport_class']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="description">Package Description</label>
                                    <div class="col-xs-6">
                                        <textarea id="description" name="description" class="ckeditor"><?php echo $pacresult['description']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="duration">Duration</label>
                                    <div class="col-md-6">
                                        <input id="duration" name="duration" class="form-control " value="<?php echo $pacresult['duration']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="itinerary">Itinerary</label>
                                    <div class="col-xs-6">
                                        <textarea id="itinerary" name="itinerary" class="ckeditor"><?php echo $pacresult['itinerary']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="price">Price</label>
                                    <div class="col-md-6">
                                        <input id="price" name="price" class="form-control " value="<?php echo $pacresult['price']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="image">Package Image</label>
                                    <div class="col-md-6">
                                        <img style="height: 60px; width: 60px;" src="<?php echo $pacresult['image']; ?>">
                                        <input id="image" name="image" type="file">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="quantity">Queantity</label>
                                    <div class="col-md-6">
                                        <input id="quantity" name="quantity" class="form-control " value="<?php echo $pacresult['quantity']; ?>" type="text">
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_type">Package Type</label>
                                    <div class="col-md-6">
                                        <select id="pac_type" name="pac_type" class="form-control" size="1">
                                            <option value="0">Normal Package</option>
                                            <option value="1">Special Package</option>
                                            <option value="2">Daily Package</option>
                                            
                                        </select>
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