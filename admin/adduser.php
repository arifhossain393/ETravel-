                        
                    <?php include 'inc/header.php'; ?>
                        
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Add User</h1>
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
                                $user_name = $fm->validation($_POST['user_name']);
                                $email = $fm->validation($_POST['email']);
                                $password = $fm->validation(md5($_POST['password']));
                                $user_type = $_POST['user_type'];

                                $name = mysqli_real_escape_string($db->link, $name);
                                $user_name = mysqli_real_escape_string($db->link, $user_name);
                                $email = mysqli_real_escape_string($db->link, $email);
                                $password = mysqli_real_escape_string($db->link, $password);
                                $user_type = mysqli_real_escape_string($db->link, $user_type);

                                if (empty($name) || empty($user_name) || empty($email) || empty($password) || empty($user_type)) {
                                    echo"<span style='color:red;'>Field must not be Empty!</span>";
                                }else{
                                    $query = "INSERT INTO  tbl_admin(name, user_name, email, password, user_type) VALUES('$name', '$user_name', '$email', '$password', '$user_type')";
                                    $userinsert = $db->insert($query);

                                    if ($userinsert) {
                                        echo"<span style='color:green;'>Add User Successfully</span>";
                                    }else {
                                         echo"<span style='color:red;'>User not Added</span>";
                                    }
                                }
                              }

                            ?>
                           <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard" enctype="multipart/form-data">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Name</label>
                                    <div class="col-md-5">
                                        <input id="name" name="name" class="form-control " placeholder="Name" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user_name">User Name</label>
                                    <div class="col-md-5">
                                        <input id="user_name" name="user_name" class="form-control " placeholder="User Name.." type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="email">Email</label>
                                    <div class="col-md-5">
                                        <input id="email" name="email" class="form-control " placeholder="Enter Email" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="category">Password</label>
                                    <div class="col-md-5">
                                        <input id="password" name="password" class="form-control "  type="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user_type">User Type</label>
                                    <div class="col-md-5">
                                        <select id="user_type" name="user_type" class="form-control" size="1">
                                            <option value="0">Admin</option>
                                            <option value="1">Administor</option>
                                        </select>
                                    </div>
                                </div>
                              
                            <!-- END First Step -->

                                <!-- Form Buttons -->
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-sm btn-primary" id="next4" value="Next">Add</button>
                                    </div>
                                </div>
                                <!-- END Form Buttons -->
                            </form>
                           
                        </div>
                        <!-- END Mini Top Stats Row -->
                       
                    </div>
                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>