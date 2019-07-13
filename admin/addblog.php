                        
                    <?php include 'inc/header.php'; ?>
                        
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Add Blog</h1>
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
                            
                            $catid = mysqli_real_escape_string($db->link, $_POST['catid']);
                            $title = mysqli_real_escape_string($db->link, $_POST['title']);
                            $description = mysqli_real_escape_string($db->link, $_POST['description']);
                            $pub_date = mysqli_real_escape_string($db->link, $_POST['pub_date']);
                            $author_name = mysqli_real_escape_string($db->link, $_POST['author_name']);

                            $permited = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['blog_img']['name'];
                            $file_size = $_FILES['blog_img']['size'];
                            $file_temp = $_FILES['blog_img']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $uniq_image = substr(md5(time()), 0,10).'.'.$file_ext;

                            $upload_image = "upload/".$uniq_image;

                            if ($catid == "" || $title == "" || $description == "" || $pub_date == "" || $author_name == "" ) {
                                echo"<span style='color:red;'>Field must not be empty</span>";
                            } elseif (empty($file_name)) {
                            echo "<div class='alert alert-danger'>Select any Image.</div>";
                            }elseif (in_array($file_ext, $permited) === false) {
                                echo "<div class='alert alert-danger'>you can upload only:-".implode(',', $permited)."</div>";
                            }else {
                                
                            
                            move_uploaded_file($file_temp, $upload_image);
                            $query = "INSERT INTO tbl_blog(catid, title, description, blog_img, pub_date, author_name) VALUES('$catid', '$title', '$description', '$upload_image', '$pub_date', '$author_name')";
                            $insert_rows = $db->insert($query);
                            if ($insert_rows) {
                                echo "<span style='color:green;'>Add Package Successfully</span>";
                            }else {
                                echo "<span style='color:red;'>Package Not add Successfully</span>";
                            }
                        }
                    }
                    ?>
                           <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard" enctype="multipart/form-data">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="title">Blog Title</label>
                                    <div class="col-md-6">
                                        <input id="title" name="title" class="form-control " placeholder="Package Title.." type="text">
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
                                    <label class="col-md-4 control-label" for="description">Blog Description</label>
                                    <div class="col-xs-6">
                                        <textarea id="description" name="description" class="ckeditor"></textarea>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="blog_img">Blog Image</label>
                                    <div class="col-md-6">
                                        <input id="blog_img" name="blog_img" type="file">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pub_date">Publish Date</label>
                                    <div class="col-md-6">
                                        <input id="example-datepicker3" name="pub_date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="author_name">Author Name</label>
                                    <div class="col-md-6">
                                        <input id="author_name" name="author_name" class="form-control " placeholder="Author Name" type="text">
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