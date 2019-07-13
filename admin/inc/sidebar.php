                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Brand -->
                            <a href="index.html" class="sidebar-brand">
                                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Deshi</strong>Travels</span>
                            </a>
                            <!-- END Brand -->
                                <?php
                                        if (isset($_GET['action']) && $_GET['action'] == "logout") {
                                            Session::destroy();
                                        }

                                ?>
                            <!-- User Info -->
                            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                                <div class="sidebar-user-avatar">
                                    <a href="index.php">
                                        <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar">
                                    </a>
                                </div>
                                <div class="sidebar-user-name"><?php echo Session::get('user_name'); ?></div>
                                <div class="sidebar-user-links">
                                    <a href="profile.php" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                                    <a href="inbox.php" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                                    
                                    <a href="?action=logout" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                                </div>
                            </div>
                         <!-- END User Info -->
                         <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Destination</span></a>
                                    <ul>
                                        <li>
                                            <a href="add_destination.php">Add Destination</a>
                                        </li>
                                        <li>
                                            <a href="destinationlist.php">View Destination</a>
                                        </li>
                                       
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Category</span></a>
                                    <ul>
                                        <li>
                                            <a href="addcategory.php">Add Category</a>
                                        </li>
                                        <li>
                                            <a href="viewcategory.php">Category List</a>
                                        </li>
                                       
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Hotel</span></a>
                                    <ul>
                                        <li>
                                            <a href="addhotel.php">Add Hotel</a>
                                        </li>
                                        <li>
                                            <a href="viewhotel.php">Hotel List</a>
                                        </li>
                                       
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Transport</span></a>
                                    <ul>
                                        <li>
                                            <a href="addtransport.php">Add Transport</a>
                                        </li>
                                        <li>
                                            <a href="viewtransport.php">Transport List</a>
                                        </li>
                                       
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Package</span></a>
                                    <ul>
                                        <li>
                                            <a href="addpackage.php">Add Package</a>
                                        </li>
                                        <li>
                                            <a href="viewpackage.php">Package List</a>
                                        </li>
                                        <li>
                                            <a href="addgallery.php">Add Gallery</a>
                                        </li>
                                        <li>
                                            <a href="viewgallery.php">Gallery List</a>
                                        </li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Package Booking</span></a>
                                    <ul>
                                        <li>
                                            <a href="viewcustompackage.php">custom package</a>
                                        </li>
                                       <li>
                                            <a href="bookinglist.php">Booking List</a>
                                        </li>
                                        <li>
                                            <a href="customer.php">User List</a>
                                        </li>
                                        <li>
                                            <a href="bookamount.php">Booking Amount</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Website Settings</span></a>
                                    <ul>
                                        <li>
                                            <a href="addblog.php">Add Blog</a>
                                        </li>
                                       
                                    </ul>
                                </li>


                            </ul>
                            <!-- END Sidebar Navigation -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Main Sidebar -->