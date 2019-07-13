                    <?php include 'inc/header.php'; ?>

                    <?php 
                        if (!isset($_GET['msgId']) || $_GET['msgId'] == NULL) {
                            header("location:inbox.php");
                        }else {
                            $id = $_GET['msgId'];
                        }

                    ?>
                    
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Inbox Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1><i class="fa fa-eye"></i> View Message<br><small>Your Message Center</small></h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Dashboard</li>
                            <li>Inbox</li>
                            <li><a href="">Single Message</a></li>
                        </ul>
                        <!-- END Inbox Header -->

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
                            
                    
                            <!-- View Message -->
                            <div class="col-sm-8 col-lg-9">
                             <?php 
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        
                                    $to = mysqli_real_escape_string($db->link, $_POST['toemail']);
                                    $message = mysqli_real_escape_string($db->link, $_POST['message']);
                                    
                                   $sendemail = mail($to, $subject);

                                   if ($sendemail) {
                                       echo "<span style='color:green;'>Your Mail send Successfully</span>";
                                   }else {
                                       echo "<span style='color:red;'>Mail not send</span>";
                                   }
                                }

                              ?>  

                            <?php
                                $query = "SELECT * FROM tbl_contact WHERE id='$id' ORDER BY id DESC";
                                $msg = $db->select($query);

                                if ($msg) {
                                    while ($result = $msg->fetch_assoc()) {
                                      
                            ?>

                                <!-- View Message Block -->
                                <div class="block full">
                                    <!-- View Message Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></a>
                                            <a href="?delId=<?php echo $result['id']; ?>" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                        </div>
                                        <h2><strong><?php echo $result['subject']; ?></strong> <small></h2>
                                    </div>
                                    <!-- END View Message Title -->

                                    <!-- Message Meta -->
                                    <table class="table table-borderless table-vcenter remove-margin">
                                        <tbody>
                                            <tr>
                                                <td class="hidden-xs">
                                                    <strong><?php echo $result['email']; ?></strong>
                                                </td>
                                                <td class="text-right"><strong><?php echo $fm->DateFormate($result['date']); ?></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <!-- END Message Meta -->

                                    <!-- Message Body -->
                                    
                                    <p><?php echo $result['message']; ?></p>
                                    
                                    <!-- END Message Body -->

                                    <!-- Quick Reply Form -->
                                    <form action="" method="post" onsubmit="return false;">
                                        <input style="display: none;" type="email" name="toemail" value="<?php echo $result['email']; ?>" />
                                        <textarea id="message-quick-reply" name="message" rows="5" class="form-control push-bit" placeholder="Your message.."></textarea>
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-share"></i> Quick Reply</button>
                                    </form>
                                    <!-- END Quick Reply Form -->
                                </div>
                                <!-- END View Message Block -->

                                <?php } } ?>

                            </div>
                            <!-- END View Message -->
                        </div>
                        <!-- END Inbox Content -->
                    </div>
                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>