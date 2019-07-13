                        
                    <?php include 'inc/header.php'; ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Inbox Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1><i class="gi gi-envelope"></i> Inbox<br><small>Your Message Center</small></h1>
                            </div>
                        </div>
                        <!-- Inbox Content -->
                        <div class="row">
                            <!-- Inbox Menu -->
                            <div class="col-sm-4 col-lg-3">
                                <!-- Menu Block -->
                                <div class="block full">
                                    <!-- Menu Title -->
                                    <div class="block-title clearfix">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
                                        </div>
                                        <div class="block-options pull-left">
                                            <a href="sendmessage.php" class="btn btn-alt btn-sm btn-default"><i class="fa fa-pencil"></i> Compose Message</a>
                                        </div>
                                    </div>
                                    <!-- END Menu Title -->

                                    <!-- Menu Content -->
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active">
                                            <a href="inbox.php">
                                                <i class="fa fa-angle-right fa-fw"></i> <strong>Inbox</strong>
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="sendmessage.php">
                                                <i class="fa fa-angle-right fa-fw"></i> <strong>Sent</strong>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                    <!-- END Menu Content -->
                                </div>
                                <!-- END Menu Block -->

                            </div>
                            <!-- END Inbox Menu -->

                            <!-- Messages List -->
                            <div class="col-sm-8 col-lg-9">
                                <!-- Messages List Block -->
                                <div class="block">
                                    <!-- Messages List Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <h2>Inbox <strong>
                                        <?php
                                        //Inbox Notification
                                            $query = "SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC";
                                            $msg = $db->select($query);
                                            if ($msg) {
                                                $count = mysqli_num_rows($msg);
                                                echo "(".$count.")"; 
                                            }else {
                                                echo "0";
                                            }

                                        ?>

                                        </strong></h2>
                                    </div>
                                    <!-- END Messages List Title -->

                                    <!-- Messages List Content -->
                                    <div class="table-responsive">
                                        <table class="table table-hover table-vcenter">
                                            <tbody>
                                                <!-- Use the first row as a prototype for your column widths -->
                                    <?php
                                        $query = "SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC";
                                        $msg = $db->select($query);

                                        if ($msg) {
                                            $i = 0;
                                            while ($result = $msg->fetch_assoc()) {
                                               $i++; 
                                     ?>

                                                <tr>
                                                    <td class="text-center" style="width: 30px;">
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td class="text-center" style="width: 30px;">
                                                        <a href="javascript:void(0)" class="text-muted msg-fav-btn"><i class="fa fa-star-o"></i></a>
                                                    </td>
                                                    <td class="text-center" style="width: 30px;">
                                                        <a href="javascript:void(0)" class="text-success msg-read-btn"><i class="fa fa-circle"></i></a>
                                                    </td>
                                                    <td style="width: 20%;"><?php echo $result['name']; ?></td>
                                                    <td>
                                                        <a href="single-message.php?msgId=<?php echo $result['id']; ?>"><strong><?php echo $result['email']; ?></strong></a>
                                                        <span class="text-muted"><?php echo $result['subject']; ?></span>
                                                    </td>
                                                    <td class="text-center" style="width: 30px;">
                                                        <i class="fa fa-paperclip"></i>
                                                    </td>
                                                    <td class="text-right" style="width: 90px;">
                                                        <a href="single-message.php?msgId=<?php echo $result['id']; ?>"><em>view</em></a></td>
                                                </tr>

                                            <?php } } ?>



                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END Messages List Content -->
                                </div>
                                <!-- END Messages List Block -->
                            </div>
                            <!-- END Messages List -->
                        </div>
                        <!-- END Inbox Content -->
                    </div>
                    <!-- END Page Content -->

                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>